<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormJobsRequest;
use App\Models\Article;
use App\Models\City;
use App\Models\PressRequest;
use App\Models\Speciality;
use App\Services\Files\FileService;
use App\Telegram\SendMessages;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){

        return view('articles.main', [
            'articles' => Article::query()->with([
                'creators'
            ])->where('is_active', 1)->orderBy('public_at', 'desc')->paginate(9),
            'title' => __('main.name')
        ]);
    }

    public function formJobs(
        FormJobsRequest $request,
        FileService $service
    ){
        $photo = $request->has('photo')
            ? $service->setParams($request, 'photo', 'press')->storeFile()
            : null;

        $created = PressRequest::query()->create(array_merge($request->validated(), [
            'photo_id' => $photo->id ?? null
        ]));

        if(isset($created->id)) {

            $text = collect([
                    sprintf('Новая заявка на репортера - №%s', $created->id),
                    sprintf('Фамилия %s', $created->last_name),
                    sprintf('Имя %s', $created->first_name),
                    sprintf('Email %s', $created->email),
                    sprintf('Телефон %s', $created->phone),
                    sprintf('Должность %s', $created->special->name),
                    sprintf('Область %s', $created->region),
                    sprintf('Город %s', $created->city),
                ]);

            if($created->car_brand !== null and $created->car_number !== null){
                $text->push(sprintf('Марка машины %s', $created->car_brand))
                    ->push(sprintf('Модель машины %s', $created->car_number));
            }

            SendMessages::send($text->join("\n"), $created);

            return response()->json([
                'status' => 1
            ]);
        }

        return response()->json([
            'status' => 0
        ]);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function form(){
        return view('pages.form');
    }

    public function contactForm(){

        return response()->json([
            'status' => 1
        ]);

    }

    public function about(){
        return view('pages.main');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Language;
use App\Models\Translations\CityTranslation;
use Illuminate\Console\Command;

class CityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zbara:city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $data = [
            ['name' => 'Київ'],
            ['name' => 'Львів'],
            ['name' => 'Івано-Франківськ'],
            ['name' => 'Тернопіль'],
            ['name' => 'Харків'],
            ['name' => 'Дніпро'],
            ['name' => 'Вінниця'],
            ['name' => 'Рівне'],
            ['name' => 'Запоріжжя'],
            ['name' => 'Одеса'],
            ['name' => 'Хмельницький'],
            ['name' => 'Полтава'],
            ['name' => 'Черкаси'],
            ['name' => 'Житомир'],
            ['name' => 'Чернівці'],
            ['name' => 'Кропивницький'],
            ['name' => 'Миколаїв'],
            ['name' => 'Чернігів'],
            ['name' => 'Ужгород'],
            ['name' => 'Суми'],
            ['name' => 'Херсон'],
            ['name' => 'Донецьк'],
            ['name' => 'Луганськ'],
            ['name' => 'Сімферополь'],
            ['name' => 'Луцьк'],
        ];

        foreach ($data as $key =>  $item) {
           $createdId =  City::create([
                'active' => 1,
                'sort' => $key + 1
            ]);

            foreach (Language::where('active', 1)->get() as $value){
                CityTranslation::create([
                    'city_id' => $createdId->id,
                    'name' => $item['name'],
                    'language_id' => $value->id,
                ]);
            }
        }
    }
}

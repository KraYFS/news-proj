@extends('layouts.app')
@section('title', $articles->name)

@section('content')
    <div class="article__page">
        <div class="container content__container">
            <div class="page__header">
                <h1 class="head">
{{--                    {{ __('main.news.title') }}--}}
                </h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('common.main') }}" class="crumb__link">
                            {{ __('main.breadcrumbs.main') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.main') }}" class="crumb__link">
                            {{ __('main.breadcrumbs.news') }}
                        </a>
                    </li>
                    <li>
                        <span class="crumb__link current">
                            {{ $articles->name }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="article__wrapper">
            <div class="news__detail">           
                <h2>{{ $articles->name }}</h2>
                <div class="article__detail">
                    <div class="article__authors">
                        @foreach($articles->creators as $create)
                        <div class="article__author">
                            <div class="author__image">
                                <img src="{{ $create->employees->photo }}" width="48" height="48" alt="">
                            </div>
                            <div class="author__title">
                                <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}">{{ $create->employees->last_name }} {{ $create->employees->first_name }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="article__statistic">
                    <div class="article__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                27.01.24
                            </div>
                            <div class="article__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                84
                            </div>
                </div>
                    </div>
                <img class="article__img" src="{{ $articles->photo }}" width="640" height="300" alt="">
                <div>
                    {!! $articles->text !!}
                </div>
            </div>
        </div>
    </div>
@endsection

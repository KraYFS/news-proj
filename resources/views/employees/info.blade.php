@extends('layouts.app')
@section('title', implode(' ', [ $employees->last_name, $employees->first_name]))

@section('content')
    <div class="person__page">
        <div class="container content__container">
            <div class="page__header">
                <h1 class="head">
                    {{ __('main.breadcrumbs.employees') }}
                </h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('common.main') }}" class="crumb__link">
                            {{ __('main.breadcrumbs.main') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employees.main') }}" class="crumb__link">
                            {{ __('main.breadcrumbs.employees') }}
                        </a>
                    </li>
                    <li>
                        <span class="crumb__link current">
                            {{ $employees->last_name }} {{ $employees->first_name }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="about__person">
                <div class="person__image">
                    <img src="{{ $employees->photo }}" width="150" height="200" alt="">
                </div>
                <div class="person__content">
                    <h2 class="person__name">
                        {{ $employees->last_name }} {{ $employees->first_name }}
                    </h2>
                    <div class="person__subtitle">
                        {{ $employees->speciality->name }}
                    </div>
                    <div class="person__description">
                        {{ $employees->description }}
                    </div>
                    <div class="person__articles-count">
                        <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="">
                        {{ $employees->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $employees->creator->count()) }}
                    </div>
                </div>
            </div>
            <h2 class="news__title">
                Новини:
            </h2>
            <div class="news__wrapper">
                @foreach($employees->creator as $item)
                    <div class="news__item">
                        <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $item->article->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $item->article->views }}
                            </div>

                        </div>
                        <div class="img__wrapper">
                            <img src="{{ $item->article->photo }}" width="428" height="200" alt="">
                            <div class="img__link__wrapper">
                                <span class="img__link">
                                    <a href="{{ route('news.info', ['slug' => $item->article->slug]) }}">
                                        читати статтю
                                    </a>
                                    <a href="{{ route('news.info', ['slug' => $item->article->slug]) }}" class="news__arrow">
                                        <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                    </a>
                                </span>
                            </div>
                        </div>
                        <h3 class="news__title">
                            <a href="{{ route('news.info', ['slug' => $item->article->slug]) }}">
                                {{ $item->article->name }}
                            </a>
                        </h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

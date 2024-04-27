@extends('layouts.app')
@section('title', __('main.breadcrumbs.employees'))


@section('content')
    <div class="staff__page">
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
                        <span class="crumb__link current">
                            {{ __('main.breadcrumbs.employees') }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="staff__wrapper">
                @foreach($employees as $item)
                    <a href="{{ route('employees.info', ['id' => $item->id]) }}" class="staff__item">
                        <div class="item__image">
                            <img src="{{ $item->photo }}" width="150" height="200" alt="">
                        </div>
                        <div class="item__content">
                            <h2 class="name">
                                {{ $item->last_name }}  {{ $item->first_name }}
                            </h2>
                            <div class="subtitle">
                                {{ $item->speciality->name }}
                            </div>
                            <div class="item__link">
                                <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="" class="icon">
                                <span class="link__title"> {{ $item->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $item->creator->count()) }}</span>
                                <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" class="link__arrow"
                                     alt="">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('employees.info', ['id' => $item->id]) }}" class="staff__item">
                        <div class="item__image">
                            <img src="{{ $item->photo }}" width="150" height="200" alt="">
                        </div>
                        <div class="item__content">
                            <h2 class="name">
                                {{ $item->last_name }}  {{ $item->first_name }}
                            </h2>
                            <div class="subtitle">
                                {{ $item->speciality->name }}
                            </div>
                            <div class="item__link">
                                <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="" class="icon">
                                <span class="link__title"> {{ $item->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $item->creator->count()) }}</span>
                                <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" class="link__arrow"
                                     alt="">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('employees.info', ['id' => $item->id]) }}" class="staff__item">
                        <div class="item__image">
                            <img src="{{ $item->photo }}" width="150" height="200" alt="">
                        </div>
                        <div class="item__content">
                            <h2 class="name">
                                {{ $item->last_name }}  {{ $item->first_name }}
                            </h2>
                            <div class="subtitle">
                                {{ $item->speciality->name }}
                            </div>
                            <div class="item__link">
                                <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="" class="icon">
                                <span class="link__title"> {{ $item->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $item->creator->count()) }}</span>
                                <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" class="link__arrow"
                                     alt="">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('employees.info', ['id' => $item->id]) }}" class="staff__item">
                        <div class="item__image">
                            <img src="{{ $item->photo }}" width="150" height="200" alt="">
                        </div>
                        <div class="item__content">
                            <h2 class="name">
                                {{ $item->last_name }}  {{ $item->first_name }}
                            </h2>
                            <div class="subtitle">
                                {{ $item->speciality->name }}
                            </div>
                            <div class="item__link">
                                <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="" class="icon">
                                <span class="link__title"> {{ $item->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $item->creator->count()) }}</span>
                                <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" class="link__arrow"
                                     alt="">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('employees.info', ['id' => $item->id]) }}" class="staff__item">
                        <div class="item__image">
                            <img src="{{ $item->photo }}" width="150" height="200" alt="">
                        </div>
                        <div class="item__content">
                            <h2 class="name">
                                {{ $item->last_name }}  {{ $item->first_name }}
                            </h2>
                            <div class="subtitle">
                                {{ $item->speciality->name }}
                            </div>
                            <div class="item__link">
                                <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="" class="icon">
                                <span class="link__title"> {{ $item->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $item->creator->count()) }}</span>
                                <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" class="link__arrow"
                                     alt="">
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('employees.info', ['id' => $item->id]) }}" class="staff__item">
                        <div class="item__image">
                            <img src="{{ $item->photo }}" width="150" height="200" alt="">
                        </div>
                        <div class="item__content">
                            <h2 class="name">
                                {{ $item->last_name }}  {{ $item->first_name }}
                            </h2>
                            <div class="subtitle">
                                {{ $item->speciality->name }}
                            </div>
                            <div class="item__link">
                                <img src="{{ asset('/img/rupor.svg') }}" width="20" height="22" alt="" class="icon">
                                <span class="link__title"> {{ $item->creator->count() }} {{ \App\Libs\Str::declination(__('main.news.declination'), $item->creator->count()) }}</span>
                                <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" class="link__arrow"
                                     alt="">
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

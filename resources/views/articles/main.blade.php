@extends('layouts.app')

@if(isset($title))
    @section('title', $title)
@else
    @section('title', __('main.news.title'))
@endif
@section('content')
    <div class="news__page">
        <div class="container content__container">
            <div class="page__header">
                <h1 class="head">
                    {{ __('main.news.title') }}
                </h1>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('common.main') }}" class="crumb__link">
                            {{ __('main.breadcrumbs.main') }}
                        </a>
                    </li>
                    <li>
                        <span class="crumb__link current">
                            {{ __('main.breadcrumbs.news') }}
                        </span>
                    </li>
                </ul>
            </div>
            
            <div class="news__wrapper">
                @foreach($articles as $items)
                <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>
                    <div class="news__item">
                        <div class="news__detail">
                            <div class="news__authors">
                                @foreach($items->creators as $create)
                                    <div class="news__author">
                                        <div class="author__img">
                                            <img src="{{ $create->employees->photo }}" width="24" height="24" alt="">
                                        </div>
                                        <a href="{{ route('employees.info', ['id' => $create->employees_id]) }}" class="author__title">
                                            {{ $create->employees->last_name }} {{ $create->employees->first_name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="news__info">
                            <div class="news__date">
                                <img src="{{ asset('/img/calendar.svg') }}" width="18" height="18" alt="">
                                {{ \Carbon\Carbon::parse( $items->public_at)->format('d.m.Y') }}
                            </div>
                            <div class="news__views">
                                <img src="{{ asset('/img/view.svg') }}" width="22" height="16" alt="">
                                {{ $items->views }}
                            </div>
                            
                        </div>
                    </div>
                    <div class="img__wrapper">
                        <img src="{{ $items->photo }}" width="428" height="200" alt="" loading="lazy" >
                            <div class="img__link__wrapper">
                            <a href="{{ route('news.info', ['slug' => $items->slug]) }}" >
                                <span class="img__link">
                                    читати статтю
                                </span>
                                <a href="{{ route('news.info', ['slug' => $items->slug]) }}"  class="news__arrow">
                                    <img src="{{ asset('/img/arr-right.svg') }}" width="13" height="12" alt="">
                                </a>
                            </a>
                            </div>
                        </div>
                        <h3 class="news__title">
                            {{ $items->name }}
                        </h3>
                    </div>

                @endforeach

            </div>
        </div>
        <div class="select_page">
            <a href="#" class="select_page_link">&#8592</a>
            <a href="#" class="select_page_link">1</a>
            <a href="#" class="select_page_link">2</a>
            <a href="#" class="select_page_link">&#8594</a>
        </div>
    </div>
@endsection

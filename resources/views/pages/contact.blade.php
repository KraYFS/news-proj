@extends('layouts.app')
@section('title', __('main.header.contact'))

@section('content')
<div class="container content__container">
    <div class="page__header">
        <h1 class="head">
            {{ __('main.header.contact') }}
        </h1>
        <ul class="breadcrumbs">
            <li>
                <a href="{{ route('common.main') }}" class="crumb__link">
                    {{ __('main.breadcrumbs.main') }}
                </a>
            </li>
            <li>
                <span class="crumb__link current">
                    {{ __('main.header.contact') }}
                </span>
            </li>
        </ul>
    </div>
    <div class="to_contact_page">
        <!--        <form action="{{ route('common.contactForm') }}" method="post" id="formContact">-->
        @csrf
        <div class="input__wrapper">
            <div class="label required">
                <img src="{{ asset('/img/icon_mail.svg') }}" alt="">{{ __('main.contacts_form.mail') }}
            </div>
            <a href="mailto:oleksmanushin@gmail.com">oleksmanushin@gmail.com</a>
        </div>
        <div class="input__wrapper">
            <div class="label required">
                <img src="{{ asset('/img/phone_icon.svg') }}" alt="">{{ __('main.contacts_form.tel') }}
            </div>
            <a href="tel:+380950289478">+38 095 028 94 78</a>
        </div>
        <div class="input__wrapper">
            <div class="label required">
                <img src="{{ asset('/img/location_icon.svg') }}" alt="">{{ __('main.contacts_form.address') }}
            </div>
            <p>Україна, 03035, місто Київ, вул. Сурикова, будинок 3, корпус 37, офіс 7</p>
        </div>
    </div>
</div>

<script>
window.addEventListener('load', function() {
const url = new URL(window.location.href);
const params = new URLSearchParams(url.search);
const openmodal = params.get('openmodal');

if(openmodal == 1){
    document.getElementById("openModal").click()
}
});
</script>

@endsection

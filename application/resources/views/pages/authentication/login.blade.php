@extends('layout.wrapperauth')
@section('content')
<div class="form-container">
    <div class="login-container" id="login-container">
        <div class=" text-center company__info">
            <span class="company__logo">
                <img src="{{ runtimeLogoLarge() }}" class="logo-image">
            </span>
            <!-- <h2 class="logo-title">{{ config('app.name')  }}</h2> -->
        </div>
        <h1 class="title">Log In</h1>
        <form lass="form-group" id="loginForm">
            <div class="input-container">
                <input type="text" placeholder="{{ cleanLang(__('lang.email')) }}" autofocus="on" name="email" id="email" value="{{ old('email') ?? request()->cookie('email') }}" />
            </div>
            <div class="input-container">
                <input type="password" placeholder="{{ cleanLang(__('lang.password')) }}" autofocus="on" name="password" value="{{ request()->cookie('password') ?? '' }}" />
            </div>

            <div class="remember mt-3">
                <input type="checkbox" name="remember_me" id="remember_me" {{ old('remember_me') || request()->hasCookie('email') ? 'checked' : '' }}>
                <label for="remember_me" style="color: #1d407f;">{{ cleanLang(__('lang.remember_me')) }}</label>
                <div class="">
                    <a href="{{ url('forgotpassword') }}" class="mb-2">Forgot Password?</a>
                </div>
            </div>

            <div class="gray-line"></div>

            <div class="account-controls">
                <div class="buttons">
                    <button type="submit" value="Submit" class="continue" id="loginSubmitButton" data-button-loading-annimation="yes" data-button-disable-on-click="yes"
                        data-url="{{ url('login?action=initial&redirect_url=' . request('redirect_url')) }}" data-ajax-type="POST">
                        {{ cleanLang(__('lang.continue')) }} <i class="fas fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="placeholder-banner" id="banner">
        <img src="{{ url('public/images/home-page-banner.jpg') }}" alt="" class="banner">
    </div>
</div>
@endsection
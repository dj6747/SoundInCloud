@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="import"  href="/components/upload.template.html" >
    <link rel="import"  href="/components/newsFeedElement.template.html">
@endsection

@section('title')
    profile
@endsection

@section('content')

    <div class="left-side">
        <h2>Janez Novak</h2>
        <form id="register-form">
            {{ __('Name') }}:<br>
            <input type="text" name="firstname" placeholder="{{ __('Enter your name') }}..." autofocus><br>
            {{ __('Last name') }}:<br>
            <input type="text" name="lastname" placeholder="{{ __('Enter your last name') }}..." ><br>
            {{ __('Email') }}:<br>
            <input type="email" name="email" placeholder="{{ __('Enter your email') }}..."><br>
            {{ __('Password') }}:<br>
            <input type="password" placeholder="{{ __('Enter your password') }}..." name="password"><br>
            {{ __('Repeat password') }}:<br>
            <input type="password" placeholder="{{ __('Repeat your password') }}..." name="repeat_password">
            <br>
            {{ __('Gender') }}:
            <select name="gender">
                <option value="M">{{ __('Male') }}</option>
                <option value="F">{{ __('Female') }}</option>
            </select><br>

            <button class="sign-up">{{ __('Update data') }}</button>
        </form>
    </div>

    <div class="right-side">
        @include('components.friends-box')
    </div>
@endsection


@section('scripts')
    <script src="/js/login.js"></script>
@endsection

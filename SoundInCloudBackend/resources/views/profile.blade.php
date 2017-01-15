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
        <form id="register-form" method="POST" action="{{ route('updateProfile') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ __('First name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text"  class="form-control" name="firstname" value="{{ $user->firstname }}" required autofocus>

                    @if ($errors->has('firstname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">{{ __('Last name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required autofocus>

                    @if ($errors->has('lastname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{ __('E-mail') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">{{ __('Confirm password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            {{ __('Gender') }}:
            <select name="gender">
                @if($user->gender == 'M')
                    <option value="M" selected>{{ __('Male') }}</option>
                    <option value="F">{{ __('Female') }}</option>
                @else
                    <option value="M">{{ __('Male') }}</option>
                    <option value="F" selected>{{ __('Female') }}</option>
                @endif
            </select><br>

            <button type="submit" class="sign-up">{{ __('Update data') }}</button>
        </form>
    </div>

    <div class="right-side">
        @include('components.friends-box')
    </div>
@endsection


@section('scripts')
    <script src="/js/login.js"></script>
@endsection

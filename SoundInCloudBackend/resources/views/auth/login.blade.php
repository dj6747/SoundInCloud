@extends('layouts.guest')

@section('content')

    <div class="login-form">
            <form id="login-form"  role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-Mail Address</label>

                    <div >
                        <input id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="">Password</label>

                    <div class="">
                        <input id="password" type="password"  name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary sign-in">
                    Login
                </button>

        </form>
        <br>
        <span>or <a href="/register">sign up</a></span>
    </div>

@endsection
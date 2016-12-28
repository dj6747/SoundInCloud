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
            Name:<br>
            <input type="text" name="firstname" placeholder="Enter your name..." autofocus><br>
            Last name:<br>
            <input type="text" name="lastname" placeholder="Enter your last name..." ><br>
            Email:<br>
            <input type="email" name="email" placeholder="Enter your email..."><br>
            Password:<br>
            <input type="password" placeholder="Enter your password..." name="password"><br>
            Repeat password:<br>
            <input type="password" placeholder="Repeat your password..." name="repeat_password">
            <br>
            Gender:
            <select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>

            <button class="sign-up">Update data</button>
        </form>
    </div>

    <div class="right-side">
        <div class="friends-box">
            <div class="top">People you may know</div>
            <div class="add-friend">
                <span class="name">John Doe</span>
                <button type="submit" class="add-friend-btn">Add friend</button>
            </div>
            <div class="bottom">
                <div class="search">
                    <form>
                        <input type="text" name="search_friends" placeholder="Search friends"/>
                        <button type="submit" class="search-btn">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="/js/login.js"></script>
@endsection

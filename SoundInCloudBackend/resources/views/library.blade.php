@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="import"  href="/components/upload.template.html" >
    <link rel="import"  href="/components/newsFeedElement.template.html">
@endsection

@section('title')
    library
@endsection

@section('content')
    <div class="left-side">
        @include('components.upload')


        <div class="news-feed">
            <div class="news-feed-element">
                <div class="title">
                    Guns'n roses - Sweet child o'mine
                </div>
                <div class="audio">
                    <audio controls>
                        <source src="../audio/song1.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>

                <div class="controls">
                    <form>
                        <div class="btn like-btn">
                            <button type="submit">like</button>
                        </div>
                        <div class="btn share-btn">
                            <button type="submit">share</button>
                        </div>
                        <div class="btn add-to-lib-btn">
                            <span class="long"> <button type="submit">add to my library</button></span>
                            <span class="short"> <button type="submit">add</button></span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="right-side">
        @include('components.friends-box')
    </div>

@endsection


@section('scripts')
    <script src="/js/friends.js"></script>
    <script src="/js/home.js"></script>
@endsection

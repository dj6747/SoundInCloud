@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="import"  href="/components/upload.template.html" >
    <link rel="import"  href="/components/newsFeedElement.template.html">
@endsection

@section('title')
    {{ __('home') }}
@endsection

@section('content')
    <div class="left-side">
        @include('components.upload')


            <div class="news-feed">
                @foreach($news as $element)
                    @include('components.news-feed-element')
                @endforeach
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

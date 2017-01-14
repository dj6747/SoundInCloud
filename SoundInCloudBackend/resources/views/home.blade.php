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
                    <div class="news-feed-element">
                        <div class="title">
                            {{ $element->text }}
                        </div>
                        <div class="files">
                            @foreach($element->files as $file)
                                @if($file->isAudioFile())
                                    <div class="audio">
                                        <audio controls>
                                            <source src="{{ Storage::url($file->path) }}" type="{{ $file->mime_type }}">
                                            {{ __('Your browser does not support the audio element.') }}
                                        </audio>
                                    </div>
                                @else
                                    <div class="documents">
                                        <div class="document" data-src="testSrc">
                                            <div class="icon icon-document"></div>
                                            <div class="document-title">{{ $file->name }}</div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>

                        <div class="controls">
                            <form>
                                <div class="btn like-btn">
                                    <button type="submit">{{ __('like') }}</button>
                                </div>
                                <div class="btn share-btn">
                                    <button type="submit">{{ __('share') }}</button>
                                </div>
                                <div class="btn add-to-lib-btn">
                                    <span class="long"> <button type="submit">{{ __('add to my library') }}</button></span>
                                    <span class="short"> <button type="submit">{{ __('add') }}</button></span>
                                </div>
                            </form>
                        </div>

                    </div>
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

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
        <upload-container></upload-container>


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
        <div class="friends-box">
            <div class="top">People you may know</div>
            <div class="add-friend">
                <form>
                    <span class="name">John Doe</span>
                    <button type="submit" class="add-friend-btn">Add friend</button>
                </form>
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
    <script src="/js/friends.js"></script>
    <script src="/js/home.js"></script>
@endsection

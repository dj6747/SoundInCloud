<div class="friends-box">
    <div class="top">{{ __('People you may know') }}</div>
    @foreach($people as $item)
        @if($item->id != Auth::id())
            <div class="add-friend">
                <span class="name">{{$item->firstname}} {{$item->lastname}}</span>
                <button type="submit" class="add-friend-btn">{{ __('Add friend') }}</button>
            </div>
        @endif
    @endforeach
    <div class="bottom">
        <div class="search">
            <form>
                <input type="text" name="search_friends" placeholder="Search friends"/>
                <button type="submit" class="search-btn">{{ __('Search') }}</button>
            </form>
        </div>
    </div>
</div>
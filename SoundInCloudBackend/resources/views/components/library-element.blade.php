<div class="news-feed-element">
    <div class="title">
        {{ $file->name }}
    </div>
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
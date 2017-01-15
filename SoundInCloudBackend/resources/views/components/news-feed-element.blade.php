<div class="news-feed-element">
    <div class="title">
        {{$element->user->firstname}} {{$element->user->lastname}} {{  __('shared some files.') }}<br>
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
        <form method="POST" action="{{ route('likePost') }}">
            {{ csrf_field() }}
            <input type="hidden" name="post_id" value="{{ $element->id }}">
            <div class="btn like-btn">
                @if($element->userLikes)
                    <button type="submit" class="active-action-btn" onClick="javascript:this.form.submit();">{{ __('like') }}</button>
                @else
                    <button type="submit" onClick="javascript:this.form.submit();">{{ __('like') }}</button>
                @endif
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
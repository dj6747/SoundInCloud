<form enctype="multipart/form-data" method="POST" action="{{ route('createPost') }}">
    {{ csrf_field() }}
    <div class="block1">
        <h1 class="upload-container-h1">{{ __('Upload')  }}</h1>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="file" id="file-input" name="files[]" multiple/>
    </div>

    <div class="block2 hidden">
        <b>{{ __('Uploaded files') }}:</b>
        <ul id="file-list"></ul>
        <div class="comment-section">
            <input type="text" name="text" class="comment-box" placeholder="{{ __('Insert message') }}"/>
        </div>

        <input type="hidden" name="latitude" value="1.23"/>
        <input type="hidden" name="longitude" value="2.34"/>
    </div>
    <button type="submit" class="btn btn-post">{{ __('Post') }}</button>
</form>

@section('stylesheets')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/components/upload.css">
@endsection
@extends('Layout.Header') {{-- or whatever your layout is --}}

@section('content')
{{-- <form action="{{  route('aboutus.update', $about->id)}}" method="POST" class="mb-6">
        @csrf

            @method('PUT')
        <div class="mb-4">
            <label class="block font-semibold mb-1">Title:</label>
            <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" required class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Content:</label>
            <textarea name="content" id="editor">{{ old('content', $about->content ?? '') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{'Save' }}
        </button>
    </form> --}}
{{-- create  --}}
    <form action="{{ isset($about) ? route('aboutus.update', ['aboutu' => $about->id]) : route('aboutus.store') }}" method="POST" class="mb-6">
        @csrf

        @if(isset($about))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block font-semibold mb-1">Title:</label>
            <input type="text" name="title" value="{{ old('title', $about->title ?? '') }}" required class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Content:</label>
            <textarea name="content" id="editor">{{ old('content', $about->content ?? '') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            {{ isset($about) ? 'Update' : 'Save' }}
        </button>
    </form>

    <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        toolbar: [
            { name: 'document', items: [ 'Source', '-', 'Save' ] },
            { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
            { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] }
        ],
        height: 300,
        removePlugins: 'elementspath',
    });
</script>
@endsection

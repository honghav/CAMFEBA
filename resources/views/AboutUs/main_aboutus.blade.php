@extends('Layout.Header')

@section('content')
<div class="container mx-auto p-4">

    {{-- <form action="{{ route('aboutus.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Title:</label>
            <input type="text" name="title" required class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Content:</label>
            <textarea name="content" id="editor"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form> --}}


    

    {{-- <x-primary-button><a href="{{ route('aboutus.create') }}" class="btn btn-primary">Create</a></x-primary-button> --}}
    <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#insertAboutModal">
                Create About Us
    </button>

    <!-- Display existing about us content -->
    @foreach ($AboutUs as $about)
        <div class="mb-6 mt-10border-b pb-4">
            <h1 class="text-xl font-bold mb-2">{{ $about->title }}</h1>
            <div class="prose">{!! $about->content !!}</div>
            <x-primary-button><a href="{{ route('aboutus.edit', $about->id) }}" class="btn btn-primary">Edit</a></x-primary-button>
            <br>
            <br>    
            <form action="{{ route('aboutus.destroy', $about->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <x-primary-button type="submit" class="btn btn-danger">Delete</x-primary-button>
            </form>

        </div>
    @endforeach

</div>

    <div class="modal fade" id="insertAboutModal" tabindex="-1" aria-labelledby="AboutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Create New About Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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
            </div>
        </div>
    </div>

<!-- Load CKEditor -->
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

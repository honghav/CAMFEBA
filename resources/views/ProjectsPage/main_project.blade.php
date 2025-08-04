@extends('Layout.Header')
@section('content')
<div>
    <h1 class="text-center">Welcome To page Project</h1>
    @auth
        @if(auth()->user()->isUser())
        <x-primary-button type="submit" class="btn btn-danger"><a href="{{route('project.create')}}">Create New project </a></x-primary-button>
        {{-- <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target="#insertProjectModal">
                Create About Us
        </button> --}}
        @endif
    @endauth
    <div class="flex">

        @foreach ($project as $pro)
        <x-project-crad 
        :id="$pro->id"
        :title="$pro->title"
        :cover="$pro->cover"
        >
        <x-primary-button type="submit" class="btn btn-danger"><a href="{{route('project.edit',$pro->id)}}">Edit project </a></x-primary-button>
        <form action="{{ route('project.destroy', $pro->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <x-primary-button type="submit" class="btn btn-danger">Delete</x-primary-button>
        </form>
    </x-project-crad>
    @endforeach
</div>


{{-- Form from Insert --}}

<div class="modal fade" id="insertAboutModal" tabindex="-1" aria-labelledby="AboutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Create New About Us</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- <form action="{{ isset($project) ? route('project.update', ['project' => $project->id]) : route('project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @if(isset($project))
                    @method('PUT')
                @endif

                <div>
                    <label class="block font-semibold mb-1">Title</label>
                    <input type="text" name="title" 
                        value="{{ old('title', $project->title ?? '') }}" 
                        class="border border-gray-300 rounded w-full p-2">
                    @error('title')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block font-semibold mb-1">Content</label>
                    <textarea name="content" rows="5" id="editor"
                            class="border border-gray-300 rounded w-full p-2" required>{{ old('content', $project->content ?? '') }}</textarea>
                    @error('content')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block font-semibold mb-1">Cover Image</label>
                    <input type="file" name="cover" accept="image/*"
                        class="border border-gray-300 rounded w-full p-2">
                    @error('cover')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block font-semibold mb-1">Status</label>
                    <select name="status" class="border border-gray-300 rounded w-full p-2" required>
                        <option value="ongoing" {{ old('status', $project->status ?? '') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="passed" {{ old('status', $project->status ?? '') == 'passed' ? 'selected' : '' }}>Passed</option>
                    </select>
                    @error('status')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block font-semibold mb-1">Document</label>
                    <input type="file" name="document" accept=".pdf,.doc,.docx"
                        class="border border-gray-300 rounded w-full p-2">
                    @error('document')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                        {{ isset($project) ? 'Update' : 'Create' }}
                    </button>
                </div>
            </form> --}}
        </div>
        <div class="modal-footer">
                            {{-- <x-primary-button>
                                Submit
                            </x-primary-button> --}}
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" >Create</button>
        </div>
        </div>
    </div>
 </div>
    {{-- <form action="{{ isset($project) ? route('project.update', ['project' => $project->id]) : route('project.store') }}" 
      method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @if(isset($project))
            @method('PUT')
        @endif

        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" 
                value="{{ old('title', $project->title ?? '') }}" 
                class="border border-gray-300 rounded w-full p-2">
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Content</label>
            <textarea name="content" rows="5" id="editor"
                    class="border border-gray-300 rounded w-full p-2" required>{{ old('content', $project->content ?? '') }}</textarea>
            @error('content')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Cover Image</label>
            <input type="file" name="cover" accept="image/*"
                class="border border-gray-300 rounded w-full p-2">
            @error('cover')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="border border-gray-300 rounded w-full p-2" required>
                <option value="ongoing" {{ old('status', $project->status ?? '') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="passed" {{ old('status', $project->status ?? '') == 'passed' ? 'selected' : '' }}>Passed</option>
            </select>
            @error('status')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Document</label>
            <input type="file" name="document" accept=".pdf,.doc,.docx"
                class="border border-gray-300 rounded w-full p-2">
            @error('document')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                {{ isset($project) ? 'Update' : 'Create' }}
            </button>
        </div>
    </form> --}}
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
</div>


@endsection
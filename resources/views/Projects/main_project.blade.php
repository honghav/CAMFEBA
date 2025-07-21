@extends('Layout.Header')
@section('content')
<div>
    <h1 class="text-center">Welcome To page Project</h1>
    @auth
        @if(auth()->user()->isUser())
        <x-primary-button type="submit" class="btn btn-danger"><a href="{{route('project.create')}}">Create New project </a></x-primary-button>
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


</div>


@endsection
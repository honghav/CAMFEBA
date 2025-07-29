<div>
    <form action="{{ isset($project) ? route('project.update', ['project' => $project->id]) : route('project.store') }}" 
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
</div>

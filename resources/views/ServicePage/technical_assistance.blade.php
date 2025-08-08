@extends('Layout.Header')
@section('content')
<div class="">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Add New Item
</button>
    <h1 class="text-[48px] text-center font-sans text-[#002870] font-bold m-[10px]">Technical Assistant</h1>
    <div class="flex justify-center ">
        @foreach ($selectTechnical as $technical )
           {{-- <p>{{print_r($technical)}}</p> --}}
           <x-service-card 
                :id="$technical->id"
                :route="($technical->type)"
                :title="$technical->name"
                :cover="'storage/' . $technical->file_path"  
            />
           @endforeach
    </div>
   
    <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="{{ route('technical.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Type -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                        @error('type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- File -->
                    <div class="mb-3">
                        <label for="file_path" class="form-label">File</label>
                        <input type="file" name="file_path" class="form-control">
                        @error('file_path')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_page" class="form-label">Category Page</label>
                        <select name="category_page" class="form-control" required>
                            <option value="technical">Technical</option>
                            <option value="legal">Legal</option>
                            <option value="research">Research</option>
                            <option value="consultation">Consultation</option>
                            <option value="compliance">Compliance</option>
                        </select>
                        @error('category_page')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </form>
                </div>
            </div>
        </div>

</div>
@endsection
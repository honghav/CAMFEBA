@extends('Layout.Header')

@section('content')
<!-- Button to Open Modal -->
<!-- Button to open modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layoutModal">
  Add New Layout
</button>

<x-bladewind::table>
    <x-slot name="header">
        <th>Name</th>
        <th>Image</th>
        <th>Page</th>
        <th>Action</th>
    </x-slot>
    @foreach ($layouts as $layout) 
    <tr>
        <td>{{$layout->name}}</td>
        <td><img 
          src="{{ $layout->file_path ? asset('storage/' . $layout->file_path) : asset('storage/images/coverService.jpg') }}" 
          alt="Layout Image" 
          class="img-fluid w-[100px] h-[50px]">
        </td>
        <td>{{$layout->type}}</td>
        <th><!-- Button to Open Modal -->
        {{-- @foreach ($layouts as $layout)  --}}
          <!-- Trigger Button -->
          <button type="button" class="btn btn-warning" data-bs-toggle  ="modal" data-bs-target="#editLayoutModal-{{ $layout->id }}">
            Edit Layout
          </button>

          <!-- Modal -->
          <div class="modal fade" id="editLayoutModal-{{ $layout->id }}" tabindex="-1" aria-labelledby="editLayoutModalLabel-{{ $layout->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <form action="{{ route('layouts.update', $layout->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                @method('PUT')

                <div class="modal-header">
                  <h5 class="modal-title" id="editLayoutModalLabel-{{ $layout->id }}">Edit Layout</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <!-- Name -->
                  <div class="mb-3">
                    <label for="name-{{ $layout->id }}" class="form-label">Layout Name</label>
                    <input type="text" class="form-control" id="name-{{ $layout->id }}" name="name" value="{{ old('name', $layout->name) }}" required>
                  </div>

                  <!-- Description -->
                  <div class="mb-3">
                    <label for="description-{{ $layout->id }}" class="form-label">Description</label>
                    <textarea class="form-control" id="description-{{ $layout->id }}" name="description" rows="3">{{ old('description', $layout->description) }}</textarea>
                  </div>

                  <!-- Type -->
                  <div class="mb-3">
                    <label for="type-{{ $layout->id }}" class="form-label">Type</label>
                    <select class="form-select" id="type-{{ $layout->id }}" name="type" required>
                      <option value="home1" {{ $layout->type === 'home1' ? 'selected' : '' }}>Home1</option>
                      <option value="home2" {{ $layout->type === 'home2' ? 'selected' : '' }}>Home2</option>
                      <option value="home3" {{ $layout->type === 'home3' ? 'selected' : '' }}>Home3</option>
                      <option value="service" {{ $layout->type === 'service' ? 'selected' : '' }}>Service</option>
                      <option value="about" {{ $layout->type === 'about' ? 'selected' : '' }}>About Us</option>
                      <option value="project" {{ $layout->type === 'project' ? 'selected' : '' }}>Project</option>
                      <option value="event" {{ $layout->type === 'event' ? 'selected' : '' }}>Events</option>
                      <option value="advocay" {{ $layout->type === 'advocay' ? 'selected' : '' }}>Advocay</option>
                    </select>
                  </div>

                  <!-- File Upload -->
                  <div class="mb-3">
                    <label for="file_path-{{ $layout->id }}" class="form-label">Upload File</label>
                    <input type="file" class="form-control" id="file_path-{{ $layout->id }}" name="file_path">
                    @if ($layout->file_path)
                      <small class="d-block mt-2">Current File: 
                        <a href="{{ asset('storage/' . $layout->file_path) }}" target="_blank">{{ basename($layout->file_path) }}</a>
                      </small>
                    @endif
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Update Layout</button>
                </div>
              </form>
            </div>
          </div>
        </th>
    </tr>
    @endforeach
</x-bladewind::table>   

<!-- Modal -->
<!-- Modal for create-->
<div class="modal fade" id="layoutModal" tabindex="-1" aria-labelledby="layoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="layoutModalLabel">Create New Layout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body with Form -->
      <form action="{{route('layouts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

          <!-- Name -->
          <div class="mb-3">
            <label for="name" class="form-label">Layout Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" required class="form-control">
          </div>

          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control"></textarea>
          </div>

          <!-- Type -->
          <div class="mb-3">
          <label for="type-{{ $layout->id }}" class="form-label">Type</label>
          <select class="form-select" id="type-{{ $layout->id }}" name="type" required>
            <option value="home1">Home1</option>
            <option value="home2">Home2</option>
            <option value="home3">Home3</option>
            <option value="service">Service</option>
            <option value="about">About Us</option>
            <option value="project">Project</option>
            <option value="event">Events</option>
            <option value="advocay">Advocay</option>
          </select>
        </div>
          <!-- File Upload -->
          <div class="mb-3">
            <label for="file_path" class="form-label">Upload Layout File</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
          </div>

        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Layout</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update -->
{{-- <div class="modal fade" id="editLayoutModal-{{ $layout->id }}" tabindex="-1" aria-labelledby="editLayoutModalLabel-{{ $layout->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('layouts.update', $layout->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
      @csrf
      @method('PUT')

      <div class="modal-header">
        <h5 class="modal-title" id="editLayoutModalLabel-{{ $layout->id }}">Edit Layout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <!-- Name -->
        <div class="mb-3">
          <label for="name-{{ $layout->id }}" class="form-label">Layout Name</label>
          <input type="text" class="form-control" id="name-{{ $layout->id }}" name="name" value="{{ old('name', $layout->name) }}" required>
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label for="description-{{ $layout->id }}" class="form-label">Description</label>
          <textarea class="form-control" id="description-{{ $layout->id }}" name="description" rows="3">{{ old('description', $layout->description) }}</textarea>
        </div>

        <!-- Type -->
        <div class="mb-3">
          <label for="type-{{ $layout->id }}" class="form-label">Type</label>
          <select class="form-select" id="type-{{ $layout->id }}" name="type" required>
            <option value="home1" {{ $layout->type === 'home1' ? 'selected' : '' }}>Home1</option>
            <option value="home2" {{ $layout->type === 'home2' ? 'selected' : '' }}>Home2</option>
            <option value="home3" {{ $layout->type === 'home3' ? 'selected' : '' }}>Home3</option>
            <option value="service" {{ $layout->type === 'service' ? 'selected' : '' }}>Service</option>
            <option value="about" {{ $layout->type === 'about' ? 'selected' : '' }}>About Us</option>
            <option value="project" {{ $layout->type === 'project' ? 'selected' : '' }}>Project</option>
            <option value="event" {{ $layout->type === 'event' ? 'selected' : '' }}>Events</option>
            <option value="advocay" {{ $layout->type === 'advocay' ? 'selected' : '' }}>Advocay</option>
          </select>
        </div>

        <!-- File Upload -->
        <div class="mb-3">
          <label for="file_path-{{ $layout->id }}" class="form-label">Upload File</label>
          <input type="file" class="form-control" id="file_path-{{ $layout->id }}" name="file_path">
          @if ($layout->file_path)
            <small class="d-block mt-2">Current File: <a href="{{ asset('storage/' . $layout->file_path) }}" target="_blank">{{ basename($layout->file_path) }}</a></small>
          @endif
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Update Layout</button>
      </div>
    </form>
  </div>
</div> --}}



@endsection
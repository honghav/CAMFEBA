@extends('Layout.Header')
@section('content')
<div>

    
    <h1 class="text-2xl font-bold mb-4">All Documents</h1>
    <div class="flex">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Add New Legal
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#documentModal">
        Create New Document
        </button>
    </div>



    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                {{ session('error') }}
        </div>
    @endif
    {{-- <div class="">
       <img class="h-[600px] w-[560px]"
        src="{{ $category->cover ? asset('storage/'$category->cover)) : asset('storage/images/coverService.jpg') }}" 
        alt="{{ $category->name }}"
        class="w-full h-full object-cover"
    />
    </div> --}}
    @foreach ($category as $cate )
        <p>{{$cate->name}}</p>
    @endforeach 
    @foreach ($selectTechnical as $technical )
           {{-- <p>{{print_r($technical)}}</p> --}}
           <div class="flex justify-center ">
           <x-service-card 
                :id="$technical->id"
                :route="route('legal.show',$technical->id)"
                :title="$technical->name"
                :cover="'storage/' . $technical->file_path"  
            />
            @endforeach
            
        </div>

{{-- Modal New Category --}}
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
{{-- Create new document --}}
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form action="{{route('document.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                <h5 class="modal-title" id="documentModalLabel">Create New Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required maxlength="255" />
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <!-- Cover Image -->
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Image</label>
                    <input class="form-control" type="file" id="cover" name="cover" accept="image/jpeg,image/png,image/jpg,image/gif" />
                </div>

                <!-- File Path -->
                <div class="mb-3">
                    <label for="file_path" class="form-label">File (PDF, DOC, DOCX) <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="file_path" name="file_path" required accept=".pdf,.doc,.docx" />
                </div>

                <!-- Published At -->
                <div class="mb-3">
                    <label for="published_at" class="form-label">Published Date</label>
                    <input class="form-control" type="date" id="published_at" name="published_at" />
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                    <select class="form-select" id="type" name="type" required>
                    <option value="">Select type</option>
                    <option value="Royal_kram">Royal_kram</option>
                    <option value="Sub_decree">Sub_decree</option>
                    <option value="Ministry_order">Ministry_order</option>
                    <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                    <option value="">Select status</option>
                    <option value="free">Free</option>
                    <option value="paid">Paid</option>
                    </select>
                </div>

                <!-- Technical ID -->
                <div class="mb-3">
                    <label for="technical_id" class="form-label">Technical <span class="text-danger">*</span></label>
                    <select class="form-select" id="technical_id" name="technical_id" required>
                    {{-- <option value="">Select technical</option> --}}
                    @foreach ($category as $cate)
                        <option value="{{ $cate->id }}" >{{ $cate->id }}{{ $cate->name }}</option> 
                    @endforeach
                    </select>
                </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    {{-- <h1>{{$categories->name}}</h1> --}}
    {{-- <x-bladewind::button><a href="{{route('document.create')}}">Post News Legal</a></x-bladewind::button>
        <div class="flex border-spacing-1">
            @foreach ($documents as $doc )
            <x-sub-service-card
                :id="$doc->id"
                :title="'Document: ' . $doc->title"
                :cover="'storage/' . $doc->cover"
                :khmer="'Khmer Version'"
                :english="'English Version'"
                :releaseDate="$doc->published_at instanceof \DateTime ? $doc->published_at->format('Y-m-d') : ($doc->published_at ?: 'N/A')"
                :type="$doc->type"
            />
            @endforeach
        </div>

</div> --}}


@endsection
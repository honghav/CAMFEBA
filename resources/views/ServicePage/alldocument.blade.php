@extends('Layout.Header')
@section('content')
<div>

    <h1 class="text-2xl font-bold mb-4">All Documents</h1>
    
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

    <h1>{{$category->name}}</h1>
    <x-bladewind::button><a href="{{route('document.create')}}">Post News Legal</a></x-bladewind::button>
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

</div>
@endsection
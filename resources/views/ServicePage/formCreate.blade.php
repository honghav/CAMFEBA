@extends('Layout.Header')
@section('content')
<div>
    <div class="container mx-auto px-4 py-6">
    <form method="POST" 
          action="{{ route('document.store') }}" 
          class="max-w-2xl mx-auto"
          enctype="multipart/form-data"
    >
        @csrf
        <div class="space-y-6">
            {{-- Title --}}
            <div>
                <x-bladewind::input 
                    required="true"
                    name="title"
                    label="Document Title"
                    error_message="Please enter document title"
                />
            </div>

            {{-- Description --}}
            <div>
                <x-bladewind::textarea
                    name="description"
                    label="Description"
                    placeholder="Enter document description"
                />
            </div>

            {{-- Cover Image --}}
            <div>
                <x-bladewind::filepicker
                    name="cover"
                    label="Cover Image"
                    accept="image/*"
                    placeholder="Choose a cover image"
                />
            </div>

            {{-- Document File --}}
            <div>
                <x-bladewind::filepicker
                    required="true"
                    name="file_path"
                    label="Document File"
                    accept=".pdf,.doc,.docx"
                    placeholder="Upload document file"
                />
            </div>

            {{-- Published Date --}}
            <div>
                <x-bladewind::datepicker
                    name="published_at"
                    label="Publication Date"
                    placeholder="Select date"
                />
            </div>

            {{-- Document Type --}}
            <div>
                <x-bladewind::select
                    required="true"
                    name="type"
                    label="Document Type"
                    placeholder="Select document type"
                    :data="[

                        ['label' => 'Royal Kram', 'value' => 'Royal_kram'],

                        ['label' => 'Sub Decree', 'value' => 'Sub_decree'],

                        ['label' => 'Ministry Order', 'value' => 'Ministry_order'],

                        ['label' => 'Other', 'value' => 'Other']

                    ]"
                />
            </div>

            {{-- Status --}}
            <div>
                <x-bladewind::select
                    required="true"
                    name="status"
                    label="Document Status"
                    placeholder="Select status"
                    :data="[

                        ['label' => 'Free', 'value' => 'free'],

                        ['label' => 'Paid', 'value' => 'paid']

                    ]"
                />
            </div>

            {{-- Legal Category --}}
            <div>
                @if(empty($categories))
                    <div class="text-red-500">No categories found!</div>
                @else
                    <x-bladewind::select
                        required="true"
                        name="legal_category_id"
                        label="Legal Category"
                        placeholder="Select category"
                        :data="collect($categories)->map(function($name, $id) {
                            return ['label' => $name, 'value' => $id];
                        })->values()->toArray()"
                    />
                @endif
            </div>

            {{-- Submit Button --}}
            <div class="flex justify-end">
                <x-bladewind::button
                    can_submit="true"
                    size="big"
                >
                    Create Document
                </x-bladewind::button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
@extends('Layout.Header')

@push('scripts')
<script>
    window.saveProfileAjax = () => {
        let form = document.querySelector('.profile-form-ajax');
        if (!form) {
            console.error('Form not found');
            return false;
        }

        // Clear previous errors using our custom function
        removeFormErrors();

        if (validateForm('.profile-form-ajax')) {
            unhide('.service-creating');
            hideModalActionButtons('form-mode-ajax');
            
            const formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    hideModal('form-mode-ajax');
                    showNotification(data.message, 'success');
                    window.location.reload();
                } else {
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            displayFormError(field, data.errors[field][0]);
                        });
                    }
                    showNotification(data.message || 'Operation failed', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Failed to process request', 'error');
            })
            .finally(() => {
                hide('.service-creating');
                showModalActionButtons('form-mode-ajax');
            });
        }
        return false;
    };

    // Helper functions with renamed functions to avoid conflicts
    window.removeFormErrors = () => {
        document.querySelectorAll('.error-message').forEach(el => el.remove());
    };

    window.displayFormError = (field, message) => {
        const input = document.querySelector(`[name="${field}"]`);
        if (input) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message text-red-500 text-sm mt-1';
            errorDiv.textContent = message;
            input.parentNode.appendChild(errorDiv);
        }
    };
</script>
@endpush

@section('content')
<div>
    {{-- Create Button --}}
    <x-bladewind::button
        size="tiny"
        onclick="showModal('form-mode-ajax')"
    >
        Create
    </x-bladewind::button>
    <div class="flex">
        @foreach ($categories as $cate )
        <x-service-card
                :id="$cate->id"
                :title="$cate->name"
                :cover="$cate->cover"
            />
        @endforeach
    </div>


    {{-- Modal Form --}}
    <x-bladewind::modal
        backdrop_can_close="false"
        name="form-mode-ajax"
        ok_button_action="saveProfileAjax()"
        ok_button_label="Create"
        close_after_action="false"
    >
        <form method="POST" 
              action="{{ route('service.store') }}" 
              class="profile-form-ajax" 
              enctype="multipart/form-data"
        >
            @csrf
            <b class="mt-0">Create New Service</b>
            
            <!-- Form fields -->
            <div class="mt-4">
                <x-bladewind::input 
                    required="true" 
                    name="name"
                    label="Service name" 
                    error_message="Please enter service name" 
                />
            </div>

            <div class="mt-4">
                <x-bladewind::filepicker
                    name="cover"
                    label="Cover Picture"
                    accept="image/*"
                    required="true"
                    placeholder="Choose a cover picture"
                />
            </div>

            <div class="hidden">
                <x-bladewind::processing 
                    name="service-creating"
                    message="Creating service..." 
                />
            </div>
        </form>
    </x-bladewind::modal>
</div>
@endsection
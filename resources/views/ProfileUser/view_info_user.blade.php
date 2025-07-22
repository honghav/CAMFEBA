@extends('Layout.Header')

@section('content')
<div>
    @auth
        @if(auth()->user()->isUser() || auth()->user()->isAdmin())
        <x-bladewind::button
            size="tiny"
            {{-- onclick="showModal('form-Create')" --}}
        >
            <a href="{{route('register')}}">Register news User</a>
        </x-bladewind::button>
        @endif
    @endauth

    <h1>{{$currentUser->name}}</h1>
    <x-bladewind::modal
        backdrop_can_close="false"
        name="form-Create"
        {{-- ok_button_action="saveProfile()" --}}
        {{-- ok_button_label="Create" --}}
        {{-- close_after_action="false" --}}
    >
        <form method="post" action="{{ route('register') }}" class="profile-form" enctype="multipart/form-data">
            @csrf
            <b class="mt-0">Create New User</b>
            
            <div class="mt-6">
                <x-bladewind::input 
                    required="true" 
                    name="name"
                    {{-- value="{{ old('name') }}" --}}
                    error_message="Please enter full name" 
                    label="Full Name" 
                />
            </div>

            <div class="mt-4">
                <x-bladewind::input 
                    required="true" 
                    type="email"
                    name="email"
                    {{-- value="{{ old('email') }}" --}}
                    error_message="Please enter a valid email" 
                    label="Email Address" 
                />
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <x-bladewind::input 
                    required="true" 
                    type="password"
                    name="password"
                    error_message="Password is required" 
                    label="Password" 
                />

                <x-bladewind::input 
                    required="true" 
                    type="password"
                    name="password_confirmation"
                    error_message="Please confirm password" 
                    label="Confirm Password" 
                />
                <x-bladewind::input 
                    {{-- hidden="false"  --}}
                    name="role"
                    value="member"
                />
            </div>
            <div class="mt-4">
                <x-bladewind::filepicker
                    name="profile"
                    label="Profile Picture"
                    accept="image/*"
                    placeholder="Choose a profile picture"
                />
            </div>
            

        </form>
    </x-bladewind::modal>

    {{-- Table of User --}}
    <x-bladewind::table
        divider="thin"
        striped="true"
        hover="true"
    >
        <x-slot name="header">
            <th>Profile</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </x-slot>
        @foreach($selectedadmin as $user)
            <tr>
                <td>
                    @if($user->profile)
                        <x-bladewind::avatar image="{{ asset($user->profile) }}" />
                    @else
                        <x-bladewind::avatar image="{{ asset('storage/images/coverService.jpg') }}" />
                    @endif
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <!-- Add this button to trigger the modal -->
                    <x-bladewind::button
                        size="tiny"
                        onclick="showModal('form-upadate')"
                    >
                        Edit
                    </x-bladewind::button>

                    <x-bladewind::modal
                        backdrop_can_close="false"
                        name="form-upadate-{{ $user->id }}"
                        ok_button_action="saveProfile()"
                        ok_button_label="Update"
                        close_after_action="false"
                    >

                        <form method="post" action="" class="profile-form">
                            @csrf
                            <b class="mt-0">Edit Your Profile</b>
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <x-bladewind::input required="true" name="first_name"
                                    error_message="Please enter your first name" label="First name" />

                                <x-bladewind::input required="true" name="last_name"
                                    error_message="Please enter your last name" label="Last name" />
                            </div>
                            <x-bladewind::input required="true" name="email"
                                error_message="Please enter your email" label="Email address" />

                            <x-bladewind::input numeric="true" name="mobile" label="Mobile" />
                        </form>

                    </x-bladewind::modal>
                </td>

                <td>
                    <x-bladewind::button
                    size="tiny"
                    color="red"
                    onclick="showModal('placeholder-example', {
                        auth_user: 'mike',
                        name: 'Alfred Rowe'
                    })">Delete</x-bladewind::button>
                </td>
            </tr>
        @endforeach
    </x-bladewind::table>

</div>
    <script>
        const saveProfile = (formClass) => {
    if(validateForm('.' + formClass)){
        domEl('.' + formClass).submit();
    } else {
        return false;
    }
    }

    </script>
@endsection
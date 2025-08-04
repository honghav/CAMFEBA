@extends('Layout.Header')

@section('content')
<div>
    @auth
        @if(auth()->user()->isMember() || auth()->user()->isAdmin())
        <x-bladewind::button
            size="tiny"
            {{-- onclick="showModal('form-Create')" --}}
        >
            <a href="{{route('profile.submembers')}}">View Alige</a>
        </x-bladewind::button>
        @endif
    @endauth

    <h1>{{$currentUser->name}}</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')"
        onclick="event.preventDefault();
        this.closest('form').submit();">
           {{ __('Log Out') }}
        </x-dropdown-link>
     </form></div>
   
@endsection
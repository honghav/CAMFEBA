@extends('Layout.Header')
@section('content')

<div>
    <h1>Name: {{$name}}</h1>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    @foreach ($selectedUser as $user)
    <p>{{$user->email}} || {{$user->role}}</p>    
    @endforeach

</div>
@endsection
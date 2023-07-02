@extends('Layout.App')

@section('content')

@if ($command == 'create')
    <form action="{{route ('PoliceWeb.store')}}" method="post">
    @csrf
@endif

@if ($command == 'update')
    <form action="{{route ('PoliceWeb.update', $reservation['id'])}}" method="post">
    @csrf
    @method('put')
@endif

@if ($command == 'show')
    <form>

@endif


<div class="form">
    <input type="text" name="nom" placeholder="Nom" 
    @if ($command == 'create')
        value="{{old('nom')}}"
    @endif
    @if ($command == 'update')
        value="{{old('nom', $reservation['nom'])}}"
    @endif
    @if ($command == 'show')
        value="{{$reservation ['nom']}}"
        readonly disabled
    @endif
    >
    <input type="number" name="age" placeholder="Age"
    @if ($command == 'create')
        value="{{old('age')}}"
    @endif
    @if ($command == 'update')
        value="{{old('age', $reservation['age'])}}"
    @endif
    @if ($command == 'show')
        value="{{$reservation ['age']}}"
        readonly disabled
    @endif
    >

    <input type="text" name="pays" placeholder="Pays"
    @if ($command == 'create')
        value="{{old('pays')}}"
    @endif
    @if ($command == 'update')
        value="{{old('pays', $reservation['pays'])}}"
    @endif
    @if ($command == 'show')
        value="{{$reservation ['pays']}}"
        readonly disabled
    @endif
    >
    @if ($command != 'show')
        <button type="submit" value="envoyer">Envoyer</button>
    @endif
    </div>
</form>

@if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
@endif
@endsection



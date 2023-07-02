@extends('Layout.App')
@section('title',"Liste des réservations")
@section('content')

<section>
    <table class='table'>
        <tr>
            <td><h3>Nom:</h3></td>
            <td><h3>Age: </h3></td>
            <td><h3>Pays:</h3></td>
        </tr>
    @foreach($reservations as $resa)
        <tr>
            <td>{{$resa ['nom']}}</td>
            <td>{{$resa [ 'age']}}</td>
            <td>{{$resa ['pays']}}</td>

            <td>
           
                <form action="{{route('PoliceWeb.show', $resa ['id'])}}" method="get">
                    @csrf
                    <button class='btn2'>Voir</button>
                    
                 </form>
            </td>
            <td>
                <form action="{{route('PoliceWeb.edit', $resa ['id'])}}" method="get">
                    @csrf
                   
                    <button class='btn2'>Edit</button>
                        
                </form>
            </td> 
            <td> 
                <form action="{{route('PoliceWeb.destroy', $resa ['id'])}}" method="post">
                    @csrf
                    @method('delete')
                    <button class='btn-danger'>Delete</button>
                    
                </form>
            </td> 
           

        </tr>

    @endforeach
    </table>

</section>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- terminal : npm i + npm run dev + @vite.... --}}
    @vite(['resources/css/form.css'])
    <title>App</title> 
</head>
<body>
    <header>
        <img src="https://fra1.digitaloceanspaces.com/aircosmos/media/7c5a0013ef33eef33c6ab2bae9e650b949985ea41c88932106642dfef775fabb.png" alt="">
      <a href="{{route('PoliceWeb.create')}}"><h1>PoliceWeb</h1> </a>
      <a href="{{route('PoliceWeb.index')}}">Liste des réservations </a>

        <nav>
            <ul>
              
            </ul>
        </nav>
        <hr/>
         
    </header>


    @yield('content')

    <footer>
       © Copyright Céline Conraud 2023
    </footer>
    
</body>

</html>
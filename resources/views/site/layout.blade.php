

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
</head>

<body style="background: #e2e2e2">

  @php
  use Illuminate\Support\Facades\Session;
  @endphp
  
     <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
        <li><a href="{{route('site.categoria', $categoriaM->id)}}">{{$categoriaM->nome}}</a></li>
        @endforeach
    </ul>

    
    
    <nav class="  red  " style="margin-top: 10px ; border-radius:10px ">
        <div class="nav-wrapper container">
          <a href="{{ route('site.index')}}" class="brand-logo">Curso laravel</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ route('site.index')}}">Home</a></li>
            <li><a href="#" class='dropdown-trigger' data-target='dropdown1'>Categoria<i class="material-icons right">expand_more</i></a></li> 
            <li><a href="{{ route('site.carrinho')}}">Carrinho <span class="new badge blue   " data-badge-caption='itens'>{{ \Cart::getContent()->count()}}</span></a></li>
          </ul>
        </div>
    </nav>

     
    @yield('conteudo')
      


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
          /* Dropdown */
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>


</body>
</html>
@extends('site.layout')

@section('titulo' , 'detalhes')

@section('conteudo')

   
    
    
    <div class="row container " style="margin-top: 10px">
       
        <div class="col s12 m6"><br>
          <img src="{{$produto->imagem}} " class="responsive-img" alt="{{$produto->nome}}">  
        </div>

        <div class="col s12 m6">
          
            <h4>{{$produto->nome}}</h4>
            <h4>RS: {{number_format($produto->preco,2, "," , ".") }}</h4>
            <p>{{$produto->descricao}}</p>
            <p>postado por {{$produto->user->fisrtsName}}</p>
            <p>postado por {{$produto->categoria->nome}}</p>
            
            <form action="{{route('site.addcarrinho')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$produto->id}}">
                <input type="hidden" name="name" value="{{$produto->nome}}">
                <input type="hidden" name="price" value="{{$produto->preco}}">
                <input type="number" name="qtn" min="1" value="1">
                <input type="hidden" name="img" value="{{$produto->imagem}}"><br><br>
                <button class="btn orange btn-large">Comprar</button>
            </form>
            
        </div>

    </div>
    
   
@endsection
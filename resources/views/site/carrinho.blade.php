
@extends('site.layout')
@section('titulo' , 'carrinho')
@section('conteudo')

    <div class="row container" >
        @if (session()->has('sucesso'))
            <div class="card green darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Parabéns</span>
                    <p>{{ session('sucesso') }}</p>
                </div>
            </div>
        @endif

        @if (session()->has('aviso'))
          <div class="card blue ">
              <div class="card-content white-text">
                  <span class="card-title">Tudo bem</span>
                  <p>{{ session('aviso') }}</p>
              </div>
          </div>
        @endif

        @if ($itens->count() > 0)
         	<h3>Seu carrinho possui {{$itens->count()}} produtos </h3>
        @else
         	<h3>Seu carrinho está vazio </h3>
        @endif
        
        @if ($itens->count() > 0)
          <table class="striped">
            <thead>
              <tr>
                <th>img</th>
                <th>Name</th>
                <th>Price</th>
                <th>qtd</th>	
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($itens as $item)
                <tr>
                  <td><img src="{{$item->attributes->image}}" alt="" class="respinsive-img " width="70px"></td>
                  <td>{{$item->name}}</td>
                  <td> RS: {{number_format($item->price,2, "," , ".") }}</td> 

                    {{---BTN ATUALIZAR--}}
                  <form action="{{ route('site.atualizacarrinho')}}" method="post" enctype="multipart/form-data"> 
                      @csrf
                      <input type="hidden" name="id" value="{{$item->id}}">
                      <td><input style="width: 40px; text-align:center" type="number" min="1" name="quantity" value="{{$item->quantity}}"></td>
                      <td>  
                      <button style="margin-right: 5px" class="btn-floating  waves-effect waves-light orang"><i class="material-icons">refresh</i></a> 
                  </form>

                  {{--BTN excluir--}}
                  <form action="{{ route('site.removecarrinho')}}" method="post" enctype="multipart/form-data">  
                      @csrf                           
                      <input type="hidden" name="id" value="{{$item->id}}">
                      <button type="submit" class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>
                  </td>    
                </tr> 
              @endforeach
            </tbody>
          </table>

        

          <div class="card orange darken-1">
            <div class="card-content white-text">
                <span class="card-title">Total:{{number_format(\Cart::getTotal(),2, "," , ".")}}</span>
                <p>pague em 12x em juros</p>
            </div>
        </div>

          <div class="row container left " style="margin-top: 20px ">
            <a href="" style="margin-right: 5px" class="btn col s3  waves-effect waves-light blue">Continuar comprando <i class="material-icons">arrow_back</i></a>
            <a href="{{ route('site.limpacarrinho')}}" style="margin-right: 5px" class="btn col s3  waves-effect waves-light blue">limpar carrinho</a>
            <a href=""class="btn col s3 waves-effect waves-light green">finalizar pedido<i class="material-icons">check</i></a>
          </div>
        @else
          <div class="row container left " style="margin-top: 20px ">
            <a href="{{ route('site.index')}}" style="margin-right: 5px ; width:250px " class="btn btn-larger col s3  waves-effect waves-light blue">Continuar comprando</a>
          </div>
        @endif
    </div>
   
@endsection

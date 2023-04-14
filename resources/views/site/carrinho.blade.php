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


        <h3>Seu carrinho possui {{$itens->count()}} produtos </h3>
       
        
       
        
      <table class="striped">
        <thead>
          <tr>
              <th>Name</th>
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
                <td>{{$item->price}}</td>

                {{---BTN ATUALIZAR--}}
                <form action="{{ route('site.atualizacarrinho')}}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <td><input style="width: 40px; text-align:center" type="number" name="quantity" value="{{$item->quantity}}"></td>
                    <td>  
                    <button style="margin-right: 5px" class="btn-floating  waves-effect waves-light orang"><i class="material-icons">refresh</i></a> 
                </form>
                        {{--BTN excluir--}}
                        <form action="{{ route('site.removecarrinho')}}" method="post" enctype="multipart/form-data">  
                            @csrf                           
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" class="btn-floating waves-effect waves-light red"><i class="material-icons">delele</i></button>
                        </form>
                </td>    
            </tr> 
            @endforeach
        </tbody>
      </table>

      <div class="row container left " style="margin-top: 20px ">
        <button  style="margin-right: 5px" class="btn col s3  waves-effect waves-light blue">Continuar comprando<i class="material-icons">arrow_back</i></a>
        <button style="margin-right: 5px" class="btn col s3 waves-effect waves-light blue">limpar carrinho<i class="material-icons">clear</i></a>
        <button class="btn col s3 waves-effect waves-light green">finalizar pedido<i class="material-icons">check</i></a>
      </div>
       

    </div>

    
@endsection


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
            $itens = \Cart::getContent();
            return view('site.carrinho' , compact('itens'));
    }

    public function adicionaCarrinho(Request $request)
    {
        $result = $request->all();
        var_dump($result);
       
        \Cart::add([                //o Cart vem da biblioteca darrildecode\cart
            'id' => $request -> id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->qtn,
            'attributes' => array(
                'image'=>$request->img,
            )

            ]);

            //return redirect('site.carrinho')->with('sucesso', 'produto ao adicionado no carrinho com sucesso');
            return redirect()->route('site.carrinho')->with('sucesso', 'produto adcionado no carrinho com sucsso');
    }

    public function removeCarrinho(Request $request)
    {
            \Cart::remove($request -> id);
            return  redirect()->back()->with('sucesso', 'Produto removido no carrinho com sucesso!');
            //return redirect()->route('site.removecarrinho')->with('sucesso', 'produto removido no carrinho com sucsso');
    }

    public function atualizaCarrinho(Request $request)
    {
        \Cart::update($request->id , [
            'quantity'=>[
                'relative'=> false,
                'value'=>$request->quantity,
            ],
        ]);
         
        return  redirect()->back()->with('sucesso', 'produto atualizado  no carrinho com sucesso!');
    }
}

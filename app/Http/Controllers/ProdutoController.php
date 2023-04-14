<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $produtos = Produto::paginate(4);
        return view('site.home' , compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }

    /**
     * mostra os fetalhes do card selecionado.
     */

     public function details ($slug)
     {
        $produto = Produto::where('slug', $slug) -> first();
        return view('site.details' , compact('produto'));
     }
     
     public function categoria ($id)
     {
       
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categoria', $id) -> paginate(3);
        return view('site.categoria' , compact('produtos','categoria',));
     }

     

    }

<?php
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginTesteController;
use App\Http\Controllers\ProdutoController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('produtos' , [ProdutoController::class , 'index'])->name('site.index');
Route::get('produto/{slug}' , [ProdutoController::class , 'details'])->name('site.details');
Route::get('categoria/{id}' , [ProdutoController::class , 'categoria'])->name('site.categoria');

Route::get('carrinho' , [CarrinhoController::class , 'carrinhoLista'])->name('site.carrinho');
Route::post('carrinho' , [CarrinhoController::class , 'adicionaCarrinho'])->name('site.addcarrinho');
Route::post('remover' , [CarrinhoController::class , 'removeCarrinho'])->name('site.removecarrinho');
Route::post('atualizar' , [CarrinhoController::class , 'atualizaCarrinho'])->name('site.atualizacarrinho');
route::get('limpar' , [CarrinhoController::class , 'limpaCarrinho'])->name('site.limpacarrinho');

// esta rota não funciona
Route::get('login' , [LoginController::class , 'index'])->name('login.form');






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::resource('produtos' , ProdutoController::class);

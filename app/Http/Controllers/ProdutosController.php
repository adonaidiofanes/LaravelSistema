<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Produtos;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('produtos.index',['todosprodutos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $produtos = new Produtos;
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto atualizado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos){
            abort(404);
        }
        return view('produtos.details')->with('detailpage', $produtos);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produtos::find($id);
        if(!$produtos){
            abort(404);
        }
        return view('produtos.edit')->with('detailpage', $produtos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nome' => 'required',
            'descricao' => 'required',
        ]);
        
        $produtos = Produtos::find($id);
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        $produtos->save();
        return redirect('produtos')->with('message', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produtos::find($id);
        $produtos->delete();
        return redirect('produtos')->with('message', 'Produto apagado com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();
        return view('Produtos.index', [
            'produtos' => $produtos
        ]);
    }

    public function show($id)
    {
        $produtos = Produtos::find($id);
        return view('Produtos.show', [
            'produto' => $produtos
        ]);
    }

    public function create()
    {
        return view('Produtos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sku' => 'required|unique:produtos|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric|min:1',
        ]);

        $produto = new Produtos();
        $produto->sku = $request->input('sku');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if($produto->save()){
            return redirect('produtos')->with('success', 'Produto Cadastrado! '.$produto->titulo);
        }
    }

    public function edit($id)
    {
        $produto = Produtos::find($id);
        return view('Produtos.edit', compact('produto', 'id'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::find($id);

        $this->validate($request, [
            'sku' => 'required|min:3',
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:10',
            'preco' => 'required|numeric|min:1',
        ]);

        if($request->hasFile('imgProduto')){
            $image = $request->file('imgProduto');
            $nomeArquivo = md5($id).'.'.$image->getClientOriginalExtension();
            $request->file('imgProduto')->move(public_path('./img/produtos/'), $nomeArquivo);
        }

        $produto->sku = $request->get('sku');
        $produto->titulo = $request->get('titulo');
        $produto->descricao = $request->get('descricao');
        $produto->preco = $request->get('preco');

        if($produto->save()){
            return redirect('produtos')->with('success', 'Produto Editado! '.$produto->titulo . ' | Código: '. $produto->sku);
        }
    }

    public function destroy($id)
    {
        $produto = Produtos::find($id);
        if(file_exists('./img/produtos/'.md5($id).'.jpg')){
            unlink('./img/produtos/'.md5($id).'.jpg');
        }
        $produto->delete();
        return redirect()->back()->with('success', 'Produto Deletado!');

    }
}

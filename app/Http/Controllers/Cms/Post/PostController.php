<?php

namespace App\Http\Controllers\Cms\Post;

use App\Http\Requests\cms\Post\PostStoreRequest;
use App\Http\Requests\cms\Post\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.resource.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        // Salvando imagem de capa
        $capa = $request->file('capa_path');
        if ($capa) {
            $capa = $capa->store('images/posts/' . time(), ['disk' => 'public']);
            // Adiciona campo no vetor referente a extension
            $request->merge([
                'capa_path' => $capa,
            ]);
        }

        $post = new Post($request->all());
        if ($post->save()) {

            // Controle de de volta de view
            if ($post->draft == true) {
                // TODO: Colocar parametro de volta para rascunho
                return view('cms.resource.create')->with('success', 'Notícia criada com sucesso!');
            }
            return view('cms.resource.create')->with('success', 'Notícia criada com sucesso!');
        }

        // Ocorreu algum erro apaga a imagem
        if ($capa) {
            Storage::deleteDirectory('public/' . $post->capa_path);
        }

        return redirect()->back()->with('unsuccess', 'Erro ao criar a notícia!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('cms.resource.post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        // Salvando imagem de capa
        $capa = $request->file('capa_path');
        if ($capa) {
            $capa = $capa->store('images/posts/' . time(), ['disk' => 'public']);
            // Adiciona campo no vetor referente a extension
            $request->merge([
                'capa_path' => $capa,
            ]);
            // Paga imagem antiga
            Storage::deleteDirectory('public/' . $post->capa_path);
        }

        if ($post->update($request->all())) {

            // Controle de de volta de view
            if ($post->draft == true) {
                // TODO: Colocar parametro de volta para rascunho
                return view('cms.resource.create')->with('success', 'Notícia criada com sucesso!');
            }
            return view('cms.resource.create')->with('success', 'Notícia criada com sucesso!');
        }

        // Ocorreu algum erro apaga a imagem
        if ($capa) {
            Storage::deleteDirectory('public/' . $post->capa_path);
        }

        return redirect()->back()->with('unsuccess', 'Erro ao criar a notícia!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->delete()) {
            // Apaga imagem
            if ($post->capa_path) {
                Storage::deleteDirectory('public/' . $post->capa_path);
            }

            return redirect()->back()->with('success','Excluido com sucesso!');
        }
        return redirect()->back()->with('unsuccess','Desculpe, ocorreu um erro ao excluir!');

    }
}

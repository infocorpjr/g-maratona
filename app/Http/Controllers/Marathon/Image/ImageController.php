<?php

namespace App\Http\Controllers\Marathon\Image;

use App\Models\Image;
use App\Models\Marathon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $marathonIdentification
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $marathonIdentification)
    {
        $this->validate($request, ['image' => 'required|image']);
        // Salva o arquivo no disco ...
        $path = $request->file('image')->store('images/marathon', 'public');
        //
        $marathon = Marathon::findOrFail($marathonIdentification);
        // Salva o caminho da imagem no banco no banco de dados ...
        $image = new Image();
        $image->path = $path;

        if ($marathon->images()->save($image)) {
            $request->session()->flash('created_successful', "A imagem foi salva com sucesso!");
            // Sucesso! Redireciona de volta.
            return redirect()->back();
        }
        $request->session()->flash('created_unsuccessful', 'Não foi possível salvar a image!');
        // Fracasso! Redireciona de volta.
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Resize;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Resize\Traits\ProcessImage;

class ResizeController extends Controller
{
    use ProcessImage;

    /**
     * Display the specified resource.
     *
     * @param string $parameters
     * @return \Illuminate\Http\Response
     */
    public function show($parameters)
    {
        // O caminho da imagem, subsituindo a '/ ' por '-' .
        $path = str_replace('-', '/', $parameters);
        $dirname = dirname($path);
        $basename = basename($path);
        // Largura da imagem
        $w = request('w', 150);
        // Altura da imagem
        $h = request('h', 150);
        // Verifica se o arquivo já foi criado, isso evita o processamento da imagem mais de uma vez.
        $file = $this->storagePath($dirname, $basename, $w, $h);
        if (Storage::disk('public')->exists($file)) {
            return response()->file(Storage::disk('public')->path($file));
        }
        // O caminho do arquivo original.
        $original = Storage::disk('public')->path($path);
        // Retorna o arquivo de imagem redimencionado.
        return response()->file($this->generate($original, [
            'w' => $w,
            'h' => $h
        ]));
    }
}

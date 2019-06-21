<?php

namespace App\Http\Controllers\Resize\Traits;

use Intervention\Image\Image;
use Intervention\Image\Facades\Image as Intervention;

trait ProcessImage
{
    /**
     * Retorna o caminho relativo ao `Storage::disk('public')` da imagem após ser processada
     *
     * @param string $dirname Diretório do arquivo original
     * @param string $basename Nome do arquivo original incluindo a extensão
     * @param string|int $width
     * @param string|int $height
     * @return string
     */
    private function storagePath($dirname, $basename, $width, $height)
    {
        return sprintf('%s/_%d_%d_%s', $dirname, $width, $height, $basename);
    }

    /**
     * Processa a imagem com as características desejadas.
     *
     * @param Image $image
     * @param int $width
     * @param int $height
     * @return string
     */
    private function process(Image $image, $width = 300, $height = null)
    {
        // Corta e redimenciona a imagem.
        $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        });
        // Salva a imagem
        $path = $this->storagePath($image->dirname, $width, $height, $image->basename);
        $image->save($path);
        // Retorna o nome do arquivo.
        return $image->dirname . '/' . $image->basename;
    }

    /**
     * Abre a imagem para processamento.
     *
     * @param $path
     * @param array $dimension
     * @return bool|string
     */
    public function generate($path, array $dimension)
    {
        try {
            // Tenta criar uma imagem a partir do arquivo no disco.
            $image = Intervention::make($path);
            // Verificação de parâmetros.
            $width = $dimension['w'];
            $height = $dimension['h'];
            // Processa a imagem de acordo com os parâmetros.
            return $this->process($image, $width, $height);
        } catch (\Exception $exception) {
            return abort(404);
        }
    }
}

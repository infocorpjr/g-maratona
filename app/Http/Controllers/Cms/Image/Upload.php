<?php
/**
 * Created by PhpStorm.
 * User: marcus
 * Date: 24/04/19
 * Time: 12:31
 */

namespace App\Http\Controllers\Cms\Image;

use Illuminate\Http\UploadedFile;

trait Upload
{
    /**
     * Salva um arquivo no disco com pasta especifica
     *
     * @param $file
     * @param $path
     * @return string
     */
    public function oneshot($file, $path)
    {

        return $file->store('images/' . $path . '/' . hash('md5', time()), ['disk' => 'public']);
    }


    /**
     * Salva os aquivos no disco
     *
     * @param array $files
     * @return array
     */
    public
    function multiple(array $files)
    {
        $paths = [];
        // Percorre todos os arquivos do array
        foreach ($files as $key => $file) {
            // Verifica se o arquivo é uma instancia de UploadedFile.
            if ($file instanceof UploadedFile) {
                // Salva o arquivo no disco público dentro do diretório
                // das imagens da notícia. Este método cria um único ID
                // como nome arquivo.
                $path = $file->store('news/images', 'public');
                if ($path) {
                    array_push($paths, $path);
                }
            }
        }
        return $paths;
    }
}
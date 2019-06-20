<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(\App\Models\Image::class, function (Faker $faker) {
    // Arquivo de upload falso com extensão e tamanho aleatória.
    $uploadedFile = UploadedFile::fake()->image('avatar.jpg', rand(1024, 2048), rand(1024, 2048))->size(rand(100, 800));
    // Salva a imagem no disco.
    $path = $uploadedFile->store('images/marathon', 'public');
    return [
        'path' => $path
    ];
});

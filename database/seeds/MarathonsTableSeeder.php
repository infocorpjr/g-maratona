<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class MarathonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Remove o diretório de imagem
        $d = Storage::disk('public')->deleteDirectory('images/marathon');
        $output = new ConsoleOutput();
        factory(\App\Models\Marathon::class, rand(400, 500))->create()->each(function ($marathon) use ($output) {
            $output->writeln("Seeding Maratona { " . $marathon->title . " }, um momento ...");
            $marathon->images()->saveMany(factory(\App\Models\Image::class, rand(55, 155))->make()->each(function ($image) use ($output) {
                $output->writeln("Seeding Maratona Image { " . $image->path . " }, um momento ...");
            }));
        });
    }
}

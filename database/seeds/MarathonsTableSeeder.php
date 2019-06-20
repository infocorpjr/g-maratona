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
        $output = new ConsoleOutput();
        factory(\App\Models\Marathon::class, rand(10, 50))->create()->each(function ($marathon) use ($output) {
            $output->writeln("Criando Maratona { " . $marathon->title . " }");
        });
    }
}

<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Fist seed de prod
        if (env("APP_ENV") === "production") {
            $this->call(UsersProdTableSeeder::class);
            return;
        }

        $output = new ConsoleOutput();
        $this->call(UsersTableSeeder::class);
        $this->call(MarathonsTableSeeder::class);
        $output->writeln("Finalizado seed =) ...");
    }
}

<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Console\Output\ConsoleOutput;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = new ConsoleOutput();
        factory(\App\User::class, rand(10, 15))->create()->each(function ($user) use ($output) {
            $output->writeln("Seeding Usuário { " . $user->name . ", " . $user->email . " }, um momento ...");
            $user->actor()->saveMany(factory(\App\Models\Actor::class, 1)->make()->each(function ($actor) use ($output) {
                $output->writeln("Seeding regras de acesso para o usuário ... Um momento ...");
            }));
        });
    }
}

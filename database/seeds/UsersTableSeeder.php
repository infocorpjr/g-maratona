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
        factory(\App\User::class, rand(1000, 1500))->create()->each(function ($user) use ($output) {
            $output->writeln("Criando Usuário { " . $user->name . " }");
            $user->actor()->save(factory(\App\Models\Actor::class)->make([
                'is_administrator' => false,
                'is_technician' => false,
                'is_participant' => true,
                'is_voluntary' => false
            ]));
        });
    }
}

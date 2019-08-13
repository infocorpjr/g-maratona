<?php

use App\User;
use App\Models\Actor;
use App\Models\Profile;
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
        if (env("APP_DEBUG", false)) {
            // Usuário administrador
            $administrator = new Actor([
                'is_administrator' => 1,
                'is_technician' => 0,
                'is_participant' => 0,
                'is_voluntary' => 0
            ]);
            $user = new User([
                'name' => 'Usuário administrador',
                'email' => 'administrador@email.com',
                'password' => bcrypt('123123'),
                'email_verified_at' => '2019-08-09 14:12:52'
            ]);
            $user->save();
            $user->actor()->save($administrator);
            // Cria um perfil para o usuário
            Profile::create([
                'user_id' => $user->id
            ]);
            // Usuário Participante
            $participant = new Actor([
                'is_administrator' => 0,
                'is_technician' => 0,
                'is_participant' => 1,
                'is_voluntary' => 0
            ]);
            $user = new User([
                'name' => 'Usuário participante',
                'email' => 'participante@email.com',
                'password' => bcrypt('123123'),
                'email_verified_at' => '2019-08-09 14:12:52'
            ]);
            $user->save();
            $user->actor()->save($participant);
            Profile::create([
                'user_id' => $user->id
            ]);
        }

        $output = new ConsoleOutput();
        factory(\App\User::class, rand(10, 15))->create()->each(function ($user) use ($output) {
            $output->writeln("Seeding Usuário { " . $user->name . ", " . $user->email . " }, um momento ...");
            $user->actor()->saveMany(factory(\App\Models\Actor::class, 1)->make()->each(function ($actor) use ($output) {
                $output->writeln("Seeding regras de acesso para o usuário ... Um momento ...");
            }));
            $user->profile()->saveMany(factory(\App\Models\Profile::class, 1)->make()->each(function ($profile) use ($output) {
                $output->writeln("Seeding perfil para o usuário ... Um momento ...");
            }));
        });
    }
}

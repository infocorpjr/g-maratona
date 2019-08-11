<?php

use App\Models\Actor;
use App\Models\Profile;
use App\User;
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
        if (env("APP_DEBUG")){
            $actorAdmin = new Actor([
                'is_administrator' => 1,
                'is_technician' => 0,
                'is_participant' => 0,
                'is_voluntary' => 0
            ]);

            $actorParticipante = new Actor([
                'is_administrator' => 0,
                'is_technician' => 0,
                'is_participant' => 1,
                'is_voluntary' => 0
            ]);
            // ADMIN
            $user = new User([
                'name' => 'Adminstrador do sistema',
                'email' => 'email@email.com',
                'password' => bcrypt('123123'),
                'email_verified_at' => '2019-08-09 14:12:52'
            ]);
            $user->save();
            $user->actor()->save($actorAdmin);
            Profile::create([
                'user_id' => $user->id,
                'name' => $user->name,
            ]);
            // Participante
            $user = new User([
                'name' => 'Usuario Teste',
                'email' => 'teste@email.com',
                'password' => bcrypt('123123'),
                'email_verified_at' => '2019-08-09 14:12:52'
            ]);
            $user->save();
            $user->actor()->save($actorParticipante);
            Profile::create([
                'user_id' => $user->id,
                'name' => $user->name,
            ]);
        }

        $output = new ConsoleOutput();
        factory(\App\User::class, rand(10, 15))->create()->each(function ($user) use ($output) {
            $output->writeln("Seeding Usuário { " . $user->name . ", " . $user->email . " }, um momento ...");
            $user->actor()->saveMany(factory(\App\Models\Actor::class, 1)->make()->each(function ($actor) use ($output) {
                $output->writeln("Seeding regras de acesso para o usuário ... Um momento ...");
            }));
        });
    }
}

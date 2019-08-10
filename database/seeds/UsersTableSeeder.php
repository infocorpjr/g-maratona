<?php

use App\Models\Actor;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        // Participante
        $user = new User([
            'name' => 'Marcus Goldschmidt Oliveira',
            'email' => 'marcus.part@email.com',
            'password' => bcrypt('123123'),
            'email_verified_at' => '2019-08-09 14:12:52'
        ]);
        $user->save();
        $user->actor()->save($actorParticipante);

        factory(User::class, rand(10, 15))->create()->each(function ($user) {
            $user->actor()->saveMany(factory(Actor::class, 1)->make());
        });
    }
}

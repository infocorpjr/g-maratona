<?php

use App\Models\Actor;
use App\Models\Profile;
use App\User;
use Illuminate\Database\Seeder;

class UsersProdTableSeeder extends Seeder
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
        // ADMIN
        $user = new User([
            'name' => 'Adminstrador do sistema',
            'email' => env("ADMIN_EMAIL"),
            'password' => bcrypt(env("ADMIN_PASSWORD")),
            'email_verified_at' => '2019-08-09 14:12:52'
        ]);
        $user->save();
        $user->actor()->save($actorAdmin);
        Profile::create([
            'user_id' => $user->id,
            'name' => $user->name,
        ]);
    }
}

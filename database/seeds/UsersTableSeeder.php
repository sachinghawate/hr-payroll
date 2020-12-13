<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Sachin',
                'email'          => 'sachin8info@gmail.com',
                'password'       => '$2y$10$x756Bys2/URXAf7lmeKg0.mAXCsnrSgjehIQqtENH07NyPJrRoX1q',
                'remember_token' => null,
                'created_at'     => '2020-12-04 15:55:44',
                'updated_at'     => '2020-12-04 15:55:44',
            ],
        ];

        User::insert($users);
    }
}

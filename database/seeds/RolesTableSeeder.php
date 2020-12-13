<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1', 
                'name' => 'Manager', 
                'created_at' => '2020-12-12 07:01:02', 
                'updated_at' => '2020-12-12 07:01:02'
            ],
            [
                'id' => '2', 
                'name' => 'Software Developer', 
                'created_at' => '2020-12-12 07:01:02', 
                'updated_at' => '2020-12-12 07:01:02'
            ],
            [
                'id' => '3', 
                'name' => 'Quality Analyst', 
                'created_at' => '2020-12-12 07:02:01', 
                'updated_at' => '2020-12-12 07:02:01'
            ],
            [
                'id' => '4', 
                'name' => 'Business Analyst', 
                'created_at' => '2020-12-12 07:02:01', 
                'updated_at' => '2020-12-12 07:02:01'
            ],
            [
                'id' => '5', 
                'name' => 'Grahic Designer', 
                'created_at' => '2020-12-12 07:02:29', 
                'updated_at' => '2020-12-12 07:02:29'
            ]
        ];

        Role::insert($roles);
    }
}

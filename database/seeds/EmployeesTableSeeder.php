<?php

use Illuminate\Database\Seeder;

use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'id' => '1',
                'first_name' => 'John',
                'middle_name' => 'P',
                'last_name' => 'Doe',
                'primary_phone' => '9595959595',
                'secondary_phone' => '4567568894',
                'email' => 'john.doe@gmail.com',
                'photo' => 'uploads/1607763381.jpg',
                'role_id' => '1',
                'manager_id' => NULL,
                'joining_date' => '2020-08-08',
                'created_at' => '2020-12-12 12:32:16',
                'updated_at' => '2020-12-12 12:32:16'
            ],
            [
                'id' => '2',
                'first_name' => 'Matt',
                'middle_name' => 'P',
                'last_name' => 'Washlick',
                'primary_phone' => '9595959595',
                'secondary_phone' => '4567568894',
                'email' => 'matt.washlick@gmail.com',
                'photo' => 'uploads/1607763381.jpg',
                'role_id' => '1',
                'manager_id' => '1',
                'joining_date' => '2020-03-17',
                'created_at' => '2020-12-12 12:32:16',
                'updated_at' => '2020-12-12 12:32:16'
            ],
            [
                'id' => '3',
                'first_name' => 'Mark',
                'middle_name' => 'P',
                'last_name' => 'Taylor',
                'primary_phone' => '9595959595',
                'secondary_phone' => '4567568894',
                'email' => 'mark.taylor@gmail.com',
                'photo' => 'uploads/1607763381.jpg',
                'role_id' => '2',
                'manager_id' => '1',
                'joining_date' => '2020-02-07',
                'created_at' => '2020-12-12 12:32:16',
                'updated_at' => '2020-12-12 12:32:16'
            ]
        ];

        Employee::insert($employees);
    }
}

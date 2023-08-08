<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@abc.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'User',
               'email'=>'user@abc.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

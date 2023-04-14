<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fisrtsName'=>'wilker',
            'lastName'=> 'kennedy',
            "email"=> 'wilker1@teste.com',
            'password'=>bcrypt( '12345678'),

        ]);
    }
}

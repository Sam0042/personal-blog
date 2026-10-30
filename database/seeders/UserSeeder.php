<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>'admin',
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                'name'=>'staff',
                'email'=>'staff@gmail.com',
                'password'=>'staff',
                'role'=>'staff',
                'status'=>'active'
            ],
            [
                'name'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>'customer',
                'role'=>'customer',
                'status'=>'active'
            ],
        ];

        foreach ($datas as $data) {
            User::create($data);
        };
        
    }
}

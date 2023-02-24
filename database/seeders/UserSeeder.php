<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Herbet Junior',
            'email' => 'herbetjr@gmail.com',
            'cpf' => '04261687550',
            'type' => 'admin',
            'whatsapp' => '74988114876',
            'password' => Hash::make('01072015'),
        ]);
    }
}

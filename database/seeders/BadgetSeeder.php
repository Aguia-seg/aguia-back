<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badgets')->insert([
            'color' => 'Vermelho',
            'description' => 'Usou e cancelou'
        ]);
        DB::table('badgets')->insert([
            'color' => 'Amarelo',
            'description' => 'Não teve interesse'
        ]);
        DB::table('badgets')->insert([
            'color' => 'Azul',
            'description' => 'Ficou para retornar'
        ]);
        DB::table('badgets')->insert([
            'color' => 'Verde',
            'description' => 'Em contrato'
        ]);
        DB::table('badgets')->insert([
            'color' => 'Branco',
            'description' => 'Tem morador mas não houve contato'
        ]);
        DB::table('badgets')->insert([
            'color' => 'Branco com vermelho',
            'description' => 'Desabitado'
        ]);
        DB::table('badgets')->insert([
            'color' => 'Cinza',
            'description' => 'Em contato'
        ]);
    }
}

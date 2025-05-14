<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_users')->insert([
            'nama_user' => 'Nuno Erlangga',
            'username' => 'nuno123',
            'password' =>  Hash::make('nuno290507'),
            'role' => 'admin',
            'created_at' => now(),
                'updated_at' => now()
        ]);
    }
}


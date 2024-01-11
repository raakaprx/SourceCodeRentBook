<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Facades\Schema; // Perbaikan pada use statement
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            'admin',
            'client' // Tambahkan koma di sini untuk memisahkan elemen dalam array
        ]; // Tambahkan titik koma di sini untuk mengakhiri deklarasi array

        foreach ($data as $value) {
            Role::insert([
                'name' => $value
            ]);
        }
    }
}
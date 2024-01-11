<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        category::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            'comic',
            'novel','fiction','fantasy','romance','mystery','horror','western','biography','sport','slice of life','Science Fiction','sci-fi','cartoon','comedy'// Tambahkan koma di sini untuk memisahkan elemen dalam array
        ]; // Tambahkan titik koma di sini untuk mengakhiri deklarasi array

        foreach ($data as $value) {
            category::insert([
                'name' => $value
            ]);
        }
    }
}

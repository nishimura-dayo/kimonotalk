<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'content' => "着物ショップ"
        ]);
        DB::table('categories')->insert([
            'content' => '着物コーディネート'
        ]);
        DB::table('categories')->insert([
            'content' => "着付けテクニック"
        ]);
        DB::table('categories')->insert([
            'content' => '着物姿の芸能人'
        ]);
        DB::table('categories')->insert([
            'content' => "着物警察"
        ]);
        DB::table('categories')->insert([
            'content' => 'お手入れ・収納'
        ]);
    }
}

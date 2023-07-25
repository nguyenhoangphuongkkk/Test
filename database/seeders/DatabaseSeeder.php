<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([catSeeder::class]);
        // $this->call([StudentSeeder::class]);
        // nơi tạo dữ liệu mẫu 
        //     $cat = [
        //     "name"=>"phuongnh",
        //     "email"=>"phuongnhph20706@fpt.edu.vn",
        //     "date_of_birth"=>"2003-4-9"
        // ];

        // $this->call([StudentSeeder::class,UserSeeder::class]);
        $this->call([UserSeeder::class]);


        
        // DB::table('cat')->insert($cat);
    }
}

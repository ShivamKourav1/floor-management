<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'user 1',
            'email'=>'user1@gmail.com',
            'password'=>'123',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}

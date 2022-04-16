<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $save = new User();
        $save->name = 'info@kabirentertainment.com';
        $save->email = 'info@kabirentertainment.com';
        $save->password = Hash::make('Redrose125@');
        $save->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersSeeder
 * @package Database\Seeders
 */
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'example@gmail.com',
                'password' => Hash::make('Adminpass1!'),
            ]
        ];

        foreach ($users as $user) {
            (new User)->firstOrCreate($user);
        }
    }
}

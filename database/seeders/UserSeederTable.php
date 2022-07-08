<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'super_admin@app.com',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'Mohamed Basha',
                'email' => 'mohamed@app.com',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'Mohaned',
                'email' => 'mohaned@app.com',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'Mohamoud',
                'email' => 'mohamoud@app.com',
                'password' => bcrypt('123456'),
            ]


        ];

        foreach($users as $user) {
            User::create($user);
        }

    }
}

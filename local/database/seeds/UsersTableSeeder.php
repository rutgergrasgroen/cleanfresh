<?php

use Illuminate\Database\Seeder;
use App\User as User; // to use Eloquent Model 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear table
        User::truncate(); 

        User::insert([
            'name'       => 'Rutger',
            'email'      => 'rutger@grasgroen.com',
            'password'   => '$2y$10$Uqhbrqrc8vqlB8oOUaEWl.a.aOx8WDn04t87BNRCQMhh0AkaxSE/i',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

    }
}

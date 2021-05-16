<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'RaySin',
            'username'=> 'ray',
            'email' => 'q8977452@gmail.com',
        ]);

        factory(User::class, 9)->create();
    }
}

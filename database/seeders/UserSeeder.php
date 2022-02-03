<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::factory()->create([
            'email' => 'admin@gmail.com'
        ]);
        $admin->syncRoles(['admin']);

        $super = User::factory()->create([
            'email' => 'super@gmail.com'
        ]);
        $super->syncRoles(['super']);

       $customer =  User::factory()->create([
            'email' => 'customer@gmail.com'
        ]);
        $customer->syncRoles(['customer']);

    }
}

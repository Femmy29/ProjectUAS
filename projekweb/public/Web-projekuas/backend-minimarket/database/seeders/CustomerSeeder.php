<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'name' => 'Ziezy',
            'email' => 'ziezy@gmail.com',
            'phone' => '08123456789',
            'address' => 'Jl. Palembang No. 1',
        ]);
    }
}
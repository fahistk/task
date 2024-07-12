<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                Department::create(['name' => 'Marketing Manager', 'created_at' => now(), 'updated_at' => now()]);
                Department::create(['name' => 'Mobile Application Dev', 'created_at' => now(), 'updated_at' => now()]);
                Department::create(['name' => 'HR', 'created_at' => now(), 'updated_at' => now()]);
                Department::create(['name' => 'IT', 'created_at' => now(), 'updated_at' => now()]);
                
                Designation::create(['name' => 'Sales and Marketing', 'created_at' => now(), 'updated_at' => now()]);
                Designation::create(['name' => 'Appplication development', 'created_at' => now(), 'updated_at' => now()]);

                Designation::create(['name' => 'Manager', 'created_at' => now(), 'updated_at' => now()]);
                Designation::create(['name' => 'Developer', 'created_at' => now(), 'updated_at' => now()]);

                User::factory()->count(500)->create();
        
    }
}

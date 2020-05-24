<?php

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
        for ($i=0; $i<100; $i++) {
            factory(\App\User::class)->create()->syncRoles(array_rand(\Spatie\Permission\Models\Role::all()->pluck('name')->toArray()));
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $roles = [
        [
            'name' => 'super-admin',
        ],
        [
            'name' => 'admin',
        ],
        [
            'name' => 'sales-person',
        ],
        [
            'name' => 'technician',
        ],
        [
            'name' => 'customer',
        ],
        [
            'name' => 'custom',
        ],
    ];

    public function run()
    {
        $typeOfSeeding = $this->command->ask("Decide type of seeding:\n 1. Update table\n 2. Empty Table and Re-Seed table",1);

        if($typeOfSeeding == 2){
            \Illuminate\Support\Facades\DB::statement("SET foreign_key_checks=0");
            \Spatie\Permission\Models\Role::truncate();
            \Illuminate\Support\Facades\DB::statement("SET foreign_key_checks=1");
        }

        foreach ($this->roles as $role) {
            if($typeOfSeeding == 1){
                if(! \Spatie\Permission\Models\Role::where('name',$role['name'])->exists()){
                    \Spatie\Permission\Models\Role::create($role);
                }else{
                    if($this->command->confirm('The Role already exists, do you want to update it?')) {
                        \Spatie\Permission\Models\Role::where('name', $role['name'])->update($role);
                    }
                }
            }else{
                //Type is 2
                \Spatie\Permission\Models\Role::create($role);
            }
        }
    }
}

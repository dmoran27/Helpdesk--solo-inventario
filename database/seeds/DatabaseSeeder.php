<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
       
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
      
        
       
    }
    protected function truncateTables(array $tables){
        
        DB::Statements('SET FOREING_KEY_CHECKS=0;');
        foreach ($tables as $tabla) {
             DB::table($tables)->truncate();

        }
        DB::Statements('SET FOREING_KEY_CHECKS=1;');

       
    }
 }

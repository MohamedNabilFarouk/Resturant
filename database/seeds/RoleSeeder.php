<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role -> name = 'admin';
        $role -> display_name = 'Admin';
        $role -> save();

        $role = new Role();
        $role -> name = 'moderator';
        $role -> display_name = 'Moderator';
        $role -> save();

        $role = new Role();
        $role -> name = 'delivery';
        $role -> display_name = 'Delivery';
        $role -> save();

        $role = new Role();
        $role -> name = 'kitchen';
        $role -> display_name = 'Kitchen';
        $role -> save();

        $role = new Role();
        $role -> name = 'customer';
        $role -> display_name = 'Customer';
        $role -> save();

    } // end of run
}

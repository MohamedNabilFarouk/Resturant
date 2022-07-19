<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user -> name = 'Admin' ;
        $user -> email = 'admin@app.com' ;
        $user -> email_verified_at = \Carbon\Carbon::now() ;
        $user -> phone = '01011941903' ;
        $user -> password = '$2y$10$BFw5GcloLNnHgMmWMaSBIur6zpdmzhAG/oWYrMpO8MHmqXZCXx2ke' ;
        $user -> remember_token = 'EySe6nE7VqwSwSOSffLdzE1hkCsU3XxEhGkaE26vlUpLzzPrVtqWQq1xWnl5' ;
        $user -> role = 'admin' ;
        $user -> save();

    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'info@trailanalytics.com',
            'role'=>'admin',
            'password' => bcrypt('admin'),
        ]);

        //let us also create some logs so the reports can show
        $usernames = ['john','james','samson','doreen', 'darryl', 'brian', 'alex','nathan'];
        for($x=1; $x<8; $x++ ){
            DB::table('users')->insert([
                'name' => $usernames[$x],
                'email' => $usernames[$x].'@trailanalytics.com',
                'role'=>'user',
                'password' => bcrypt($usernames[$x]),
            ]);

        }
    }
}

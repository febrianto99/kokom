<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "admin";
        $adminRole->save();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'adminn@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->save();
        $admin->attachRole($adminRole);

        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "member";
        $memberRole->save();

        $member = new User();
        $member->name = 'Member';
        $member->email = 'member@gmail.com';
        $member->password = bcrypt('member123');
        $member->save();
        $member->attachRole($memberRole);
    }
}

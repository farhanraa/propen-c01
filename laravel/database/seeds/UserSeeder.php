<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        //  DB::table('users')->insert([
        //     'name' => 'farhanraa',
        //     'email' => 'farhanraa@gmail.com',
        //     'nik_employee' => '11000093',
        //     'password' => bcrypt('gold28197'),
        //     'role' => 'employee',
        // ]);

        $employee = new User();
        $employee->username = 'farhanraa';
        $employee->email = 'farhanraa@gmail.com';
        $employee->id_employee = '3';
        $employee->password = bcrypt('gold28197');
        $employee->role = 'employee';
        $employee->save();

        $a = new User();
        $a->username = 'adminCabang';
        $a->email = 'adminCabang@mega.com';
        $a->id_employee = '2';
        $a->password = bcrypt('admin');
        $a->role = 'adminCab';
        $a->save();

        $head = new User();
        $head->username = 'headOfDepartment';
        $head->email = 'head@mega.com';
        $head->id_employee = '1';
        $head->password = bcrypt('head');
        $head->role = 'headOfDepartment';
        $head->save();

        $hr = new User();
        $hr->username = 'hrManager';
        $hr->email = 'hrd@mega.com';
        $hr->id_employee = '5';
        $hr->password = bcrypt('hrdhrd');
        $hr->role = 'hrManager';
        $hr->save();

        $employee2 = new User();
        $employee2->username = 'irfinhandi';
        $employee2->email = 'irfinhandi3@gmail.com';
        $employee2->id_employee = '4';
        $employee2->password = bcrypt('mertilang');
        $employee2->role = 'employee';
        $employee2->save();

        // $employee = new User();
        // $employee->username = 'farhanraa';
        // $employee->email = 'farhanraa@gmail.com';
        // $employee->nik_employee = '11000093';
        // $employee->password = bcrypt('gold28197');
        // $employee->role = 'employee';
        // $employee->save();

        // $employee = new User();
        // $employee->username = 'farhanraa';
        // $employee->email = 'farhanraa@gmail.com';
        // $employee->nik_employee = '11000093';
        // $employee->password = bcrypt('gold28197');
        // $employee->role = 'employee';
        // $employee->save();
    }
}

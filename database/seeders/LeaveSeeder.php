<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'leave_type'=>'casual Leave',
            ),
            array(
                'leave_type'=>'Sick Leave',
            ),
            array(
                'leave_type'=>'Paid Leave',
            ),
            array(
                'leave_type'=>'Leave Without Pay',
            ),
        );

        DB::table('leave_types')->insert($data);
    }
}

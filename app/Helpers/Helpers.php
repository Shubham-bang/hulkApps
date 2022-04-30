<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Models\LeaveTypes;
use App\Models\Leaves;

class Helpers
{
    public static function validDays($s_date = null, $e_date = null, $s_type = null, $e_type = null)
    {
        if ($s_date == $e_date) {
            if ($s_type == $e_type) {
                $leave_days = 0.5;
                return $leave_days;
            } else {
                $leave_days = 1;
                return $leave_days;
            }
            dd('shubham');
            
        } else {
            $datetime1  = new \DateTime($s_date);
            $datetime2  = new \DateTime($e_date);
            $interval   = $datetime1->diff($datetime2);
            $leave_days = $interval->days;
            return $leave_days;
        }

    }

    public static function checkYearLeaves($leave_days = null, $leave_id = null, $s_date = null, $e_date = null)
    {
        $cal_start_date   =   strtotime($s_date);
        $start_month      =   date("m",$cal_start_date);
        $start_year       =   date("Y",$cal_start_date);

        $check_years = Leaves::where('user_id', Auth::user()->id)
                                ->where('leave_type_id', $leave_id)
                                ->whereYear('start_date', $start_year)
                                ->where('status', 1)
                                ->get();
            $year_leave_count = 0;
            foreach ($check_years as $key => $check_year) {
                $year_leave_count = $check_year->no_of_days + $year_leave_count;
            }
            $differ = $year_leave_count + $leave_days;
            return $differ;
    }

    public static function checkMonthlyLeaves($leave_days = null, $s_date = null, $e_date = null)
    {
        $cal_start_date   =   strtotime($s_date);
        $start_month      =   date("m",$cal_start_date);
        $start_year       =   date("Y",$cal_start_date);

        $pre_leaves = Leaves::where('user_id', Auth::user()->id)
                                ->where('leave_type_id', '!=', 2)
                                ->whereMonth('start_date', $start_month)
                                ->where('status', 1)
                                ->get();
        $pre_leave_count = 0;
        foreach ($pre_leaves as $key => $pre_leave) {
            $pre_leave_count = $pre_leave->no_of_days + $pre_leave_count;
        }
        $differ = $pre_leave_count + $leave_days;
        return $differ;
        
    }

}

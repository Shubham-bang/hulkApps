<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Leaves;
use Auth;

class DashboardControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hour = date('H');

        
        $dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");
        if (Auth::user()->role == 'HR') {
            $users = User::where('role', 'user')->count();
            $pending_leave = Leaves::where('status', 0)->count();
            return view('dashboard')->with('data', ['dayTerm' => $dayTerm, 'users' => $users, 'pending_leave' => $pending_leave]);
        }
        else{
            $pl_leaves = Leaves::where('user_id', Auth::user()->id)->where('status', 1)->where('leave_type_id', 3)->whereYear('start_date', date('Y'))->get();
            $pl_leave_count = 0;
            foreach ($pl_leaves as $key => $pl_leave) {
                $pl_leave_count = $pl_leave->no_of_days + $pl_leave_count;
            }

            $cl_leaves = Leaves::where('user_id', Auth::user()->id)->where('status', 1)->where('leave_type_id', 1)->whereYear('start_date', date('Y'))->get();
            $cl_leave_count = 0;
            foreach ($cl_leaves as $key => $cl_leave) {
                $cl_leave_count = $cl_leave->no_of_days + $cl_leave_count;
            }

            $sl_leaves = Leaves::where('user_id', Auth::user()->id)->where('status', 1)->where('leave_type_id', 2)->whereYear('start_date', date('Y'))->get();
            $sl_leave_count = 0;
            foreach ($sl_leaves as $key => $sl_leave) {
                $sl_leave_count = $sl_leave->no_of_days + $sl_leave_count;
            }
            return view('dashboard')->with('data', ['dayTerm' => $dayTerm, 'sl_leave_count' => $sl_leave_count, 'pl_leave_count' => $pl_leave_count, 'cl_leave_count' => $cl_leave_count]);
        }
        
        // return view('dashboard')->with('dayterm', $dayTerm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request)
    {
        return view('auth.change_password');
    }
}

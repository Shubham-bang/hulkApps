<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveTypes;
use App\Models\Leaves;
use App\Models\LeaveDecline;
use App\Models\User;
use Auth;
use Validator;
use App\Http\Requests\StoreLeaveRequest;
use Carbon\Carbon;
use Helper;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leaves::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->with(['leaveType'])->get();
        return view('admin.leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leave_type = LeaveTypes::all();
        return view('admin.leaves.create', compact('leave_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveRequest $request)
    {
        $validated = $request->validated();
        $leave_types = LeaveTypes::find($request->leave_id);

        /* -- check leave pending --*/

        if ($request->leave_id == 1 || $request->leave_id == 3) {

            $leave_days        = Helper::validDays($request->start_date, $request->end_date, $request->start_half_type, $request->end_half_type);
            if ($leave_days > 2) {
                return redirect('create_leave')->with('message','You cannot take more than 2 leave.');
            }
            
            $differ_year = Helper::checkYearLeaves($leave_days, $request->leave_id, $request->start_date, $request->end_date);
            if ($differ_year > 6) {
                return redirect('create_leave')->with('message','Your Yearly ' . $leave_types->leave_type . ' is over');
            }

            $differ_month = Helper::checkMonthlyLeaves($leave_days, $request->start_date, $request->end_date);
            if ($differ_month > 2) {
                return redirect('create_leave')->with('message','Sorry Your Monthly Leave is over');
            }
             
        }
        if ($request->leave_id == 2) {

            $leave_days       = Helper::validDays($request->start_date, $request->end_date, $request->start_half_type, $request->end_half_type, 6);
            if ($leave_days > 6) {
                return redirect('create_leave')->with('message','You cannot take more than 6 leave.');
            }

            $differ_year = Helper::checkYearLeaves($leave_days, $request->leave_id, $request->start_date, $request->end_date);
            if ($differ_year > 6) {
                return redirect('create_leave')->with('message','Your Yearly ' . $leave_types->leave_type . ' is over');
            }
        }
        if ($request->leave_id == 4) {
            $leave_days     = Helper::validDays($request->start_date, $request->end_date, $request->start_half_type, $request->end_half_type, 360);
            if ($leave_days > 360) {
                return redirect('create_leave')->with('message','You cannot take more than 360 leave.');
            }
        }
        
        $leave = Leaves::create([
                     'leave_type_id'    => $request->leave_id,
                     'user_id'          => Auth::user()->id,
                     'start_date'       => $request->start_date,
                     'end_date'         => $request->end_date,
                     'start_half_type'  => $request->start_half_type,
                     'end_half_type'    => $request->end_half_type,
                     'no_of_days'       => $leave_days,
                     'reason'           => $request->reason,
                 ]);

        return redirect('leaves_listing');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewReport($id)
    {
        $report     = Leaves::find($id);
        $leave_type = LeaveTypes::find($report->leave_type_id);
        $decline_request = LeaveDecline::where('leave_id', $id)->first();
        return view('admin.leaves.list' , compact('report','leave_type', 'decline_request'));
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

    public function leaveListing(Request $request)
    {
        $leaves = Leaves::orderBy('id', 'DESC')->with(['user','leaveType'])->get();
        return view('admin.leaves.leaves_listing', compact('leaves'));
    }

    
    public function declineLeaveByHR(Request $request)
    {
        $leaves = Leaves::find($request->leave_id);
        $leaves->status = 2;
        $leaves->save();
        /* insert reason for decline leave request by HR */
        $add_decline_leave = new LeaveDecline();
        $add_decline_leave->leave_id = $request->leave_id;
        $add_decline_leave->reason   = $request->decline_reason;
        $add_decline_leave->save();

        return redirect('/view_report/' . $request->leave_id);
    }
    public function acceptLeaveByHR(Request $request)
    {
        $leaves = Leaves::find($request->status_id);
        $leaves->status = 1;
        $leaves->save();
        return response()->json([
                "success" => true,
                "message" => "Status Updated successfully",
            ]);
    }
}

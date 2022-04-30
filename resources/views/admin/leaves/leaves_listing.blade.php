@extends('layouts.admin-app')

@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leaves /</span> List of Leave</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Listing of Employees Leave</h5>
                <div class="table-responsive text-nowrap">
                  <table  id="example" class="table" style="width:100%">
                    <thead>
                      <tr>
                        <th class="col-1">S.no</th>
                        <th class="col-2">Employee Name</th>
                        <th class="col-2">Leave Type</th>
                        <th class="col-2">Applied Date</th>
                        <th class="col-2" style="text-align : center;">No of Days</th>
                        <th class="col-2">Status</th>
                        <th class="col-1">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    
                    @foreach($leaves as $key => $leave)   
                      <tr>
                        <td class="col-1">{{$key + 1}}</td>
                        <td class="col-2">{{$leave->user->name}}</td>
                        <td class="col-2">{{$leave->leaveType->leave_type}}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $leave->created_at)->isoFormat('Do MMM YYYY') }}</td>
                        <td class="col-2" style="text-align : center;">{{$leave->no_of_days}}</td>
                        <td class="col-2">
                          @if($leave->status == 0)
                            <button value="{{$leave->id}}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#pending">Pending</button>
                          @elseif($leave->status == 1)
                            <button class="btn btn-primary btn-sm">Approved</button>
                          @else
                            <button class="btn btn-danger btn-sm">Not Approved</button>
                          @endif
                          
                        </td>
                        <td class="col-1">
                            <a class="dropdown-item" href="{{ route('view.report', $leave->id) }}"><i class="bx bx-street-view"></i> view</a>
                        </td>
                      </tr>
                      @endforeach   
                    </tbody>
                  </table>
                </div>
              </div>
              </div>

    @endsection

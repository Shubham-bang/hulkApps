@extends('layouts.admin-app')

@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leave/</span> Leave History</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Leave History</h5>
                <div class="table-responsive text-nowrap">
                  <table id="example" class="table" style="width:100%">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <th>Leave Type</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th style="text-align : center;">No of Days</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    
                    @foreach($leaves as $key => $leave)   
                      <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$leave->leaveType->leave_type}}</td>
                        <td>{{$leave->start_date}}</td>
                        <td>
                        {{$leave->end_date}}
                        </td>
                        <td style="text-align : center;">{{$leave->no_of_days}}</td>
                        <td>
                          @if($leave->status == 0)
                            <span class="badge bg-label-warning me-1">Pending</span>
                          @elseif($leave->status == 1)
                            <span class="badge bg-label-primary me-1">Approved</span>
                          @else
                            <span class="badge bg-label-danger me-1">Not Approved</span>
                          @endif
                          
                        </td>
                        <td><a href="{{ route('view.report', $leave->id) }}"><i class='bx bx-street-view'></i>view</a></td>
                      </tr>
                      @endforeach   
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
              <!--/ Basic Bootstrap Table -->


              <!-- Bootstrap Dark Table -->
              
              <!--/ Bootstrap Dark Table -->

              

              <!-- Bootstrap Table with Header - Dark -->
              
              <!--/ Bootstrap Table with Header Dark -->

              

              <!-- Bootstrap Table with Header - Light -->
              
              <!-- Bootstrap Table with Header - Light -->

             

              <!-- Bootstrap Table with Header - Footer -->
              

              
             

             

              

             
              

            

          <!-- Content wrapper -->
        
      
                    
    @endsection

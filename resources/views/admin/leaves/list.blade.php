@extends('layouts.admin-app')

@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leave/</span> Leave Detail</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname"><strong>Leave Type</strong></label>
                          <div class="col-4">
                            <div class="input-group input-group-merge">
                              <input type="text" class="form-control" readonly value="{{$leave_type->leave_type}}">
                            </div>
                          </div>
                          <label class="col-sm-2"><strong>Leave Status</strong></label>
                          <div class="col-4">
                            <div class="input-group input-group-merge">
                              @if($report->status == 0)
                                <input type="text" class="form-control" readonly value="Pending">
                              @elseif($report->status == 1)
                                <input type="text" class="form-control" readonly value="Approved">
                              @else
                                <input type="text" class="form-control" readonly value="Rejected">
                              @endif
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2" for="basic-icon-default-company"><strong>Start Date</strong></label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                            <input type="text" class="form-control" readonly value="{{$report->start_date}}">

                            </div>
                          </div>
                          <label class="col-sm-2"><strong>Start Date Half</strong></label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                              <input type="text" class="form-control" readonly value="{{$report->start_half_type}}">
                              
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2" for="basic-icon-default-company"><strong>End Date</strong></label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                            <input type="text" class="form-control" readonly value="{{$report->end_date}}">

                            </div>
                          </div>
                          <label class="col-sm-2"><strong>End Date Half</strong></label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                              <input type="text" class="form-control" readonly value="{{$report->end_half_type}}">
                              
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company"><strong>Leave Reason</strong></label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              
                            <textarea
                                id="basic-icon-default-message"
                                name="reason"
                                class="form-control"
                                readonly
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                              >{{$report->reason}}</textarea>
                            </div>
                          </div>
                        </div>
                        @if(Auth::user()->role == 'user' && $report->status == 2)
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company"><strong>HR Rejection Reason</strong></label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              
                            <textarea
                                id="basic-icon-default-message"
                                name="reason"
                                class="form-control"
                                readonly
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                              >{{$decline_request->reason}}</textarea>
                            </div>
                          </div>
                        </div>
                        @endif
                        @if(Auth::user()->role == 'HR'  && $report->status == 0)
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pending">Take Action</button>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- / Content -->
<!-- Modal -->
<div class="modal fade" id="pending" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Take Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <button type="button" value="{{$report->id}}" class="btn btn-primary approved">Granted</button>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Rejected
      </button>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <form action="{{ route('hr.decline_leave_request') }}" method="POST">
          @csrf
          <input type="hidden" name="leave_id" value="{{$report->id}}">
          <div class="accordion-body">
            <textarea
              id="basic-icon-default-message"
              name="decline_reason"
              class="form-control"
              placeholder="Enter Reason of Rejected"
              aria-label="Hi, Do you have a moment to talk Joe?"
              aria-describedby="basic-icon-default-message2"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-success">submit</button>
      </form>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>      
    @endsection

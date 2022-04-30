@extends('layouts.admin-app')

@section('content')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Leave/</span> Apply Leave</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                @if(session()->has('message'))
                   <div class="alert alert-danger" role="alert">
                       </button>
                       {{ session()->get('message') }}
               </div>
                @endif
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Create Your Leave</h5>
                      
                    </div>
                    <div class="card-body">
                      <form action="{{ route('leaves.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Leave Type</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              
                              <select class="form-control" name="leave_id" id="leave_id">
                                <option disabled selected >-- please select leave type --</option>
                                @foreach($leave_type as $leave)
                                <option value="{{$leave->id}}">{{$leave->leave_type}}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->has('leave_id'))
                              <div class="error">{{ $errors->first('leave_id') }}</div>
                            @endif
                          </div>

                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2" for="basic-icon-default-company">Start Date</label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                            <input type="text" value="{{ old('start_date') }}" class="form-control date-picker-no-past-dates" name="start_date"  id="start_date">

                            </div>
                            @if($errors->has('start_date'))
                              <div class="error">{{ $errors->first('start_date') }}</div>
                            @endif
                          </div>
                          <label class="col-sm-2">Select Half</label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                              <select class="form-control" name="start_half_type" id="start_half_type">
                                <option disabled selected >-- please select Half --</option>
                                <option value="1">First Half</option>
                                <option value="2">Second Half</option>
                              </select>
                              
                            </div>
                            @if($errors->has('start_half_type'))
                              <div class="error">{{ $errors->first('start_half_type') }}</div>
                            @endif
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2" for="basic-icon-default-company">End Date</label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                            <input type="text" value="{{ old('end_date') }}" class="form-control date-picker-no-past-dates" name="end_date"  id="end_date">

                            </div>
                            @if($errors->has('end_date'))
                              <div class="error">{{ $errors->first('end_date') }}</div>
                            @endif
                          </div>
                          <label class="col-sm-2">Select Half</label>
                          <div class="col-sm-4">
                            <div class="input-group input-group-merge">
                              
                              <select class="form-control" name="end_half_type" id="end_half_type">
                                <option disabled selected>-- please select Half --</option>
                                <option value="1">First Half</option>
                                <option value="2">Second Half</option>
                              </select>
                              
                            </div>
                            @if($errors->has('end_half_type'))
                              <div class="error">{{ $errors->first('end_half_type') }}</div>
                            @endif
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Reason</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              
                            <textarea
                                id="basic-icon-default-message"
                                name="reason"
                                class="form-control"
                                placeholder="Enter Reason of Leave"
                                aria-label="Hi, Do you have a moment to talk Joe?"
                                aria-describedby="basic-icon-default-message2"
                              >{{ old('reason') }}</textarea>
                            </div>
                            @if($errors->has('reason'))
                              <div class="error">{{ $errors->first('reason') }}</div>
                            @endif
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Apply Leave</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- / Content -->
                    
    @endsection

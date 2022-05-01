@extends('layouts.admin-app')

@section('content')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Good {{ $data['dayTerm'] }} {{Auth::user()->name}}! 🎉</h5>
                          <p class="mb-4">
                            Welcome <span class="fw-bold">to the Dashboard</span> 
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @if(Auth::user()->role == 'user')
                  <div class="row">
                    <div class="col-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{asset('assets/img/icons/brands/32441.png')}}" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Paid Leave</span>
                          <h5 class="card-title text-nowrap mb-2">Paid Leave Credit - 6</h5>
                          <h5 class="card-title text-nowrap mb-2">Paid Leave Used - {{$data['pl_leave_count']}}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{asset('assets/img/icons/brands/32441.png')}}" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Sick Leave</span>
                          <h5 class="card-title text-nowrap mb-2">Sick Leave Credit - 6</h5>
                          <h5 class="card-title text-nowrap mb-2">sick Leave Used - {{$data['sl_leave_count']}}</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{asset('assets/img/icons/brands/32441.png')}}" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Casual Leave</span>
                          <h5 class="card-title text-nowrap mb-2">Casual Leave Credit - 6</h5>
                          <h5 class="card-title text-nowrap mb-2">Casual Leave Used - {{$data['cl_leave_count']}}</h5>
                        </div>
                      </div>
                    </div>
              </div>
              @else
                  <div class="row">
                    <div class="col-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{asset('assets/img/icons/brands/32441.png')}}" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                              </button>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Employees</span>
                          <h5 class="card-title text-nowrap mb-2">{{$data['users']}}</h5>
                        </div>
                      </div>
                    </div>
              </div>
              @endif
                    
                    
    @endsection

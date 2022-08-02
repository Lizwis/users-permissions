@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <a href="/">Back</a> >> View User</div>

                <div class="card-body">
                    <div class="row">
                    
                        <div class="col-lg-12">
                          <div class="card mb-4">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">User Role</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$roleType}}</p>
                                </div>
                              </div>
                              <hr>

                               <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Userame</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->username}}</p>
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Job Title</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->job_title}}</p>
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->name}}</p>
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Surname</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->surname}}</p>
                                </div>
                              </div>

                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->email}}</p>
                                </div>
                              </div>
                              <hr>
        
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Cell Number</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->phoneNumber}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$user_details->address}}</p>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center col-12">
                        @can('Edit users')
                          <a href="/user/edit/{{$user_details->id}}" class="btn btn-primary">Edit User Details</a>
                          <a href="/user/password/{{$user_details->id}}" class="btn btn-outline-danger ms-1">Change Password</a>
                        @endcan
                      </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
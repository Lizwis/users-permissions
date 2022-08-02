@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <a href="/">Back</a> >> View User</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                          <div class="card py-4">
                            <div class="card-body text-center">
                              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                              <h5 class="my-3">{{$profile->name}} {{$profile->surname}}</h5>
                              <p class="text-muted mb-1">{{$profile->job_title}}</p>
                              <p class="text-muted mb-2">{{$profile->address}}</p>
                              <div class="d-flex justify-content-center">
                                {{-- @can('Edit users') --}}
                                  <a href="/profile/edit" class="btn btn-primary">Edit User Details</a>
                                  <a href="/profile/edit/password" class="btn btn-outline-danger ms-1">Change Password</a>
                                {{-- @endcan --}}
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-8">
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
                                  <p class="text-muted mb-0">{{$profile->username}}</p>
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Job Title</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$profile->job_title}}</p>
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$profile->name}}</p>
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Surname</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$profile->surname}}</p>
                                </div>
                              </div>

                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$profile->email}}</p>
                                </div>
                              </div>
                              <hr>
        
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Cell Number</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$profile->phoneNumber}}</p>
                                </div>
                              </div>
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                  <p class="text-muted mb-0">{{$profile->address}}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
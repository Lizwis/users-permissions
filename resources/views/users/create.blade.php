@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/">Back</i></a> >> {{ __('Create New User') }}</div>

                <div class="card-body">
                    <form method="POST" action="/user/store">
                        @csrf
                       
                        <div class="row mb-3">

                        <div class="col-md-12 mb-4">
                                <label for="username">{{ __('User Name') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="surname">{{ __('Surname') }}</label>
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="phoneNumber">{{ __('Phone Number') }}</label>
                                <input id="phoneNumber" type="number" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus>

                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 

                            

                            <div class="col-md-6 mb-4">
                                <label for="job_title">{{ __('Job Title') }}</label>
                                <input id="job_title" type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title') }}" required autocomplete="job_title" autofocus>

                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="col-md-6 mb-4">
                                <label for="address">{{ __('Address') }}</label>
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                           

                            <div class="col-md-6 mb-4">
                            <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">

                                @error('toggleRoles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                               
                                    <input class="form-check-input" type="radio" name="toggleRoles" id="toggleRoles1" value="1">
                                    <label class="form-check-label" for="toggleRoles1">
                                      Select a Role
                                    </label>
                            </div>
                                
                                    <div class="col-md-6 mb-4">
                                    <input class="form-check-input" type="radio" name="toggleRoles" id="toggleRoles2" value="2">
                                    <label class="form-check-label" for="toggleRoles2">
                                      Create Custom Role
                                    </label>
                               
                                  </div>
                                  


                                  <div id="toggle-role-1" class="toHide" style="display:none">
                                    <select class="form-select form-select" id="role" name="role">
                                        <option selected disabled>Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Support">Support</option>
                                        <option value="Manager">Manager</option>
                                        <option value="User">User</option>
                                      </select>
                                </div>
                                <div id="toggle-role-2" class="toHide mb-4" style="display:none">
                                    <label for="customRoleName">{{ __('Custom role name') }}</label>
                                    <input id="customRoleName" type="text" class="mb-4 form-control @error('customRoleName') is-invalid @enderror" name="customRoleName" value="{{ old('customRoleName') }}"  autocomplete="customRoleName" autofocus>
                                    <p>Select Permissions for the role</p>
                                    <ul class="nav navbar-nav list-inline">
                                    @foreach ($permissions as $pm)
                                    <li class="list-inline-item">
                                        <input type="checkbox" class="form-check-input pr-4" id="permission{{$pm->id}}" name="permission[]" value="{{$pm->name}}">
                                        <label class="form-check-label pr-4" for="permission{{$pm->id}}">{{$pm->name}}</label>
                                    </li>
                                    @endforeach
                                    </ul>

                                </div>


                            <div class="col-md-12 mb-2">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        </div>


                        <div class="row mb-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

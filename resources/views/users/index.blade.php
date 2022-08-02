@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All users') }}</div>

                <div class="card-body">
                    @can('Create new user')
                        <a href="/user/create"><i class="btn btn-primary">Creact New</i></a>
                    @endcan
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">E-mail</th>
                                @can('View users')
                                    <th scope="col">View</th>
                                @endcan
                                @can('Edit users')
                                    <th scope="col">Edit</th>
                                @endcan
                                @can('Remove user')
                                    <th scope="col">Delete</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->username}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>
                                <td>{{$user->email}}</td>
                                @can('View users')
                                    <td>
                                        <a href="/user/show/{{$user->id}}"><i class="bi-eye-fill btn btn-primary"></i></a>      
                                    </td>
                                @endcan
                                @can('Edit users')
                                    <td>
                                        <a href="/user/edit/{{$user->id}}"><i class="bi-pencil-square btn btn-success"></i></a>
                                    </td>
                                @endcan
                                @can('Remove user')
                                <td>
                                    <form method="POST" action="/user/delete/{{$user->id}}">
                                        @csrf
                                       <button type="submit" class="btn btn-danger"><i class="bi-trash-fill"></i></button>
                                    </form>
                                </td>
                                @endcan
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Team Points and Ranking</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Images Name</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row"> {{ $user->id }}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->getimage->implode('name',', ')}}</td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
       
                </div>
            </div>
       
 @endsection

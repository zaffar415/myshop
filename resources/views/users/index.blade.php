@extends('layouts.dashboard')


@section('content')

        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            {{-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>             --}}
            <div class="card mb-4">
                {{-- <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div> --}}
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Status</th>                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>                                
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($users)
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->status == 1 ? 'Active' : 'Suspended' }}</td>
                                        <td class="flex">
                                            <a href="{{route('user.edit', $user->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>                                    
                                @endforeach
                            @endif                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
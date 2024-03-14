@extends('layouts.app')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <strong>Employee List</strong>
            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-xs pull-right py-0">Create Employee</a>
            <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Factory ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->factory_id}}</td>
                        <td>
                            <a href="{{ route('employee.show',$employee->id) }}" class="btn btn-primary btn-xs py-0">Show</a>
                            <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-warning btn-xs py-0">Edit</a>
                            <form action="{{ route('employee.destroy',$employee->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs py-0" style="margin-left: 85px; margin-top: -45px">Delete</button>
                            </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($employees->count())
                <nav>
                    {{ $employees->links() }}
                </nav>
            @endif
        </div>
    </div>
@endsection
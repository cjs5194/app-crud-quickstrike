@extends('layouts.app')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <strong>Factory List</strong>
            <a href="{{ route('factories.create') }}" class="btn btn-primary btn-xs pull-right py-0">Create Factory</a>
            <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Factory Name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factories as $factories)
                    <tr>
                        <td>{{ $factories->id }}</td>
                        <td>{{ $factories->factory_name }}</td>
                        <td>{{ $factories->location }}</td>
                        <td>{{ $factories->email }}</td>
                        <td>{{ $factories->website }}</td>
                        <td>
                            <a href="{{ route('factories.show',$factories->id) }}" class="btn btn-primary btn-xs py-0">Show</a>
                            <a href="{{ route('factories.edit',$factories->id) }}" class="btn btn-warning btn-xs py-0">Edit</a>
                            <form action="{{ route('factories.destroy',$factories->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs py-0" style="margin-left: 85px; margin-top: -45px">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


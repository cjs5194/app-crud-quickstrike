@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Employee details</p>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" value="{{ $employee->firstname }}">
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" value="{{ $employee->lastname }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{ $employee->email }}">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" value="{{ $employee->phone }}">
            </div>

            <div class="form-group">
                <label for="factory">Factory ID</label>
                <input type="text" class="form-control" value="{{ $employee->factory_id }}">
            </div>
            <a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
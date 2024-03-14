@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Factory details</p>
            <div class="form-group">
                <label for="factory_name">Factory Name</label>
                <input type="text" class="form-control" value="{{ $factory->factory_name }}">
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" value="{{ $factory->location }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" value="{{ $factory->email }}">
            </div>

            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" value="{{ $factory->website }}">
            </div>
            <a href="{{ route('factories.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection
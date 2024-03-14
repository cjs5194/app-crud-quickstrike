@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Create New Factory</p>
            <form action="{{ route('factories.store') }}" method="POST">
                @csrf
                <div class="form-group{{ $errors->has('factory_name') ? ' has-error' : '' }}">
                    <label for="factory_name">Factory Name</label>
                    <input type="text" name="factory_name" id="factory_name" class="form-control">

                    @if ($errors->has('factory_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('factory_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                    <label for="location">Location</label>
                    <input type="text" name="location" id="location" class="form-control">

                    @if ($errors->has('location'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" class="form-control">

                    @if ($errors->has('website'))
                        <span class="help-block">
                            <strong>{{ $errors->first('website') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
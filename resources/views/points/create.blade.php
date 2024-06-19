@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>Create Point</h2>
    <a class="btn btn-info" href="{{ route('points.index') }}">Back</a>
    <hr>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <form action="{{ route('points.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Country:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="country" name="country_id">
                        <option>Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="state" name="state_id">
                        <option>Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="district">District:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="district" name="district_id">
                        <option>Select District</option>
                        @foreach($districts as $district)
                        <option value="{{$district->id}}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="town">Town:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="town" name="town_id">
                        <option>Select town</option>
                        @foreach($towns as $town)
                        <option value="{{$town->id}}">{{ $town->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_active">Active:</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1">
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</div>

@endsection
@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>Update Town</h2>
    <a class="btn btn-info" href="{{ route('towns.index') }}">Back</a>
    <hr>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <form action="{{ route('towns.update', $town->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">Country:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="country" name="country_id">
                        <option>Select Country</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}" {{ $town->country_id ==  $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="state" name="state_id">
                        <option>Select State</option>
                        @foreach($states as $state)
                        <option value="{{$state->id}}"  {{ $town->state_id ==  $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="district">District:
                    </label>
                    <select class="tafreeh_select_tag form-control" id="district" name="district_id">
                        <option>Select District</option>
                        @foreach($districts as $district)
                        <option value="{{$district->id}}"  {{ $town->district_id ==  $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{$town->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_active">Active:</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ $town->is_active ? 'checked' : '' }}>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</div>

@endsection
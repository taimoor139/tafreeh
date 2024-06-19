@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>Update State</h2>
    <a class="btn btn-info" href="{{ route('states.index') }}">Back</a>
    <hr>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <form action="{{ route('states.update', $state->id) }}" method="post">
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
                        <option value="{{$country->id}}" {{ $state->country_id ==  $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{$state->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_active">Active:</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ $state->is_active ? 'checked' : '' }}>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</div>

@endsection
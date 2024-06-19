@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>Update Country</h2>
    <a class="btn btn-info" href="{{ route('countries.index') }}">Back</a>
    <hr>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <form action="{{ route('countries.update', $country->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{$country->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="is_active">Active:</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ $country->is_active ? 'checked' : '' }}>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>
</div>

@endsection
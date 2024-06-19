@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>Create Country</h2>
    <a class="btn btn-info" href="{{ route('countries.index') }}">Back</a>
    <hr>
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <form action="{{ route('countries.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
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
@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>All Countries</h2>
    <a class="btn btn-info" href="{{ route('countries.create') }}">Create</a>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table id="data" class="table table-striped table-bordered  " style="width:100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $country->name }}</td>
                <td>{!! $country->is_active
                    ? "<span class='badge rounded-pill bg-success'>Active</span>"
                    : "<span class='badge rounded-pill bg-danger'>Inactive</span>" !!}</td>
                <td>{{ $country->created_at }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('countries.edit', $country->id)}}">Edit</a>
                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ms-2" type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
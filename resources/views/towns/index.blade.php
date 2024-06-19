@extends('layouts.app')
@section('content')
<div class="form-group">
    <h2>All Towns</h2>
    <a class="btn btn-info" href="{{ route('towns.create') }}">Create</a>
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
                <th>Country</th>
                <th>State</th>
                <th>District</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($towns as $town)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $town->country->name ?? null }}</td>
                <td>{{ $town->state->name ?? null }}</td>
                <td>{{ $town->district->name ?? null }}</td>
                <td>{{ $town->name }}</td>
                <td>{!! $town->is_active
                    ? "<span class='badge rounded-pill bg-success'>Active</span>"
                    : "<span class='badge rounded-pill bg-danger'>Inactive</span>" !!}</td>
                <td>{{ $town->created_at }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary" href="{{ route('towns.edit', $town->id)}}">Edit</a>
                        <form action="{{ route('towns.destroy', $town->id) }}" method="POST">
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
@extends('admin.includes.app')
@section('content')

<div class="header row">
    <div class="col-md-8">
        <h1>Technology Type List</h1>
    </div>
    <div class="col-md-4 p-2 text-right"><a class="btn btn-success"
            href="{{ route('admin.technology_type.create') }}">Create Technology Type</a></div>

</div>
<div id="msg">
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
</div>

<table class="table table-bordered data-table" style="margin-top: 10px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @if($types->isEmpty())
            <tr>
                <td colspan="4" class="text-center">
                    <h4>No data found!</h4>
                </td>
            </tr>
        @else
            @foreach($types as $type)
                <tr id="{{ $type->id }}">
                    <td>{{ $i++ }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('admin.technology_type.edit', ['technology_type' => $type->id]) }}"
                            class="text-info m-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <i class="fas fa-trash text-danger delete_technologytype" style="cursor: pointer;"
                            data-id="{{ $type->id }}"></i>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

@endsection

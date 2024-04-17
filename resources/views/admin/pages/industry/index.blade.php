@extends('admin.includes.app')
@section('content')

<div class="header row">
    <div class="col-md-8">
        <h1>Industry List</h1>
    </div>
    <div class="col-md-4 p-2 text-right"><a class="btn btn-success "
            href="{{ route('admin.industry.create') }}"> Create New Industry</a></div>

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

<table class="table table-bordered data-table" style="margin-top: 10px ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Service Type</th>
            <th>Icon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @if($industries->isEmpty())
            <tr>
                <td colspan="4" class="text text-center">
                    <h4>No data found!</h4>
                </td>
            </tr>
        @else
            @foreach($industries as $industry)
                <tr id="{{ $industry->id }}">
                    <td>{{ $i++ }}</td>
                    <td>{{ $industry->name }}</td>
                    <td>{{ $industry->type->name }}</td>
                    <td><img src="{{ asset($industry->icon) }}" alt="Technology Icon" height="50" width="50" ></td>
                    <td>
                        <a href="{{ route('admin.industry.edit', ['industry' => $industry->id]) }}"
                            class="text-info m-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <i class="fas fa-trash text-danger delete_industry" style="cursor: pointer;"
                            data-id="{{ $industry->id }}"></i>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>


@endsection

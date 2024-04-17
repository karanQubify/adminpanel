@extends('admin.includes.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($type) ? 'Edit Type' : 'Add Type' }}</div>
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <!-- Display success message -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <form class="addTypeForm" method="POST" action="{{ isset($type) ? route('admin.types.update', $type->id) : route('admin.types.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ isset($type) ? $type->name : old('name?') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Type</label>
                            <input type="text" class="form-control" name="type" id="type"
                                value="{{ isset($type) ? $type->type : old('name?') }}">
                            <span class="error-message" style="color: red;"></span>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

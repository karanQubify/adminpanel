@extends('admin.includes.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($service) ? 'Edit Service' : 'Add Service' }}</div>
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
                    {{-- Using Spatie Laravel HTML Package --}}
                    {{ html()->form(isset($service) ? 'PUT' : 'POST', isset($service) ? route('admin.service.update', $service->id) : route('admin.service.store'))->class(isset($service) ? 'editService' : 'addService')->attribute('enctype', 'multipart/form-data')->open() }}
                        @csrf
                        @if(isset($service))
                            {{ method_field('PUT') }}
                        @endif
                        <div class="form-group">
                            {{ html()->label('Name', 'name') }}
                            {{ html()->text('name')->class('form-control')->value(isset($service) ? $service->name : old('name')) }}
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            {{ html()->label('Type', 'type') }}
                            <select class="form-control" id="type" name="type">
                                <option value="">Select Type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" @if(isset($service) && $service->service_id == $type->id) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            {{ html()->label('Description', 'description') }}
                            {{ html()->textarea('description')->class('form-control')->value(isset($service) ? $service->description : old('description')) }}
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            @if(isset($service) && $service->icon)
                                <img src="{{ asset($service->icon) }}" alt="Icon Preview" class="img-thumbnail mt-2" height="100" width="100"><br>
                            @endif
                            {{ html()->label('Upload Icon', 'icon') }}
                            {{ html()->file('icon')->class('form-control-file') }}
                            <span id="iconerror" style="color:red"></span>
                            <div id="iconPreview"></div>
                            @error('icon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>         

                        {{ html()->button('Submit', 'submit')->class('btn btn-primary') }}
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

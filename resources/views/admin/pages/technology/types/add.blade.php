@extends('admin.includes.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($technology) ? 'Edit Technology Type' : 'Add Technology Type' }}</div>
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
                    @if(isset($technology))
                        {{ html()->modelForm($technology, 'PUT', route('admin.technology_type.update', ['technology_type' => $technology->id]))->open() }}
                    @else
                        {{ html()->form('POST', route('admin.technology_type.store'))->class('addTypeForm')->open() }}
                    @endif

                    @csrf

                    <div class="form-group">
                        {{ html()->label('Technology Name', 'name') }}
                        {{ html()->text('name')->class('form-control')->placeholder('Enter technology type name.')->value(isset($technology) ? $technology->name : old('name'))->id('name') }}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

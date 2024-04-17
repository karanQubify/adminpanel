@extends('admin.includes.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($industry) ? 'Edit Industry Type' : 'Add Industry Type' }}</div>
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
                    @if(isset($industry))
                        {{ html()->modelForm($industry, 'PUT', route('admin.industry_type.update', ['industry_type' => $industry->id]))->open() }}
                    @else
                        {{ html()->form('POST', route('admin.industry_type.store'))->class('addTypeForm')->open() }}
                    @endif

                    @csrf

                    <div class="form-group">
                        {{ html()->label('Industry Name', 'name') }}
                        {{ html()->text('name')->class('form-control')->placeholder('Enter industry type name.')->value(isset($industry) ? $industry->name : old('name'))->id('name') }}
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

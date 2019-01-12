@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	    @if(session('message'))<div  class="alert alert-info" > {{ session('message') }}</div>
                    @endif
                <div class="card-header">{{ __('Create Car') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create-car') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="mark" class="col-md-4 col-form-label text-md-right">{{ __('Mark') }}</label>

                            <div class="col-md-6">
                                <input id="mark" type="text" class="form-control{{ $errors->has('mark') ? ' is-invalid' : '' }}" name="mark" value="{{ old('mark') }}" required autofocus>

                                @if ($errors->has('mark'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mark') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plate_number" class="col-md-4 col-form-label text-md-right">{{ __('Plate Number') }}</label>

                            <div class="col-md-6">
                                <input id="plate_number" type="plate_number" class="form-control{{ $errors->has('plate_number') ? ' is-invalid' : '' }}" name="plate_number" value="{{ old('plate_number') }}" required>

                                @if ($errors->has('plate_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plate_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('owner') }}</label>

                            <div class="col-md-6">
                                <input id="owner" type="owner" class="form-control{{ $errors->has('owner') ? ' is-invalid' : '' }}" name="owner" required>

                                @if ($errors->has('owner'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('owner') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

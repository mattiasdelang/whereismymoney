@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Store') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <input id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>

                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" required autocomplete="logo">

                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
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

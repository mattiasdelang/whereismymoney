@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Store') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('transaction.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="bedrag" class="col-md-4 col-form-label text-md-right">{{ __('Bedrag') }}</label>

                                <div class="col-md-6">
                                    <input id="bedrag" type="number" step="any" class="form-control @error('bedrag') is-invalid @enderror" name="bedrag" value="{{ old('bedrag') }}" required autocomplete="bedrag" autofocus>

                                    @error('bedrag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="datum" class="col-md-4 col-form-label text-md-right">{{ __('Datum') }}</label>

                                <div class="col-md-6">
                                    <input id="datum" type="date" class="form-control @error('datum') is-invalid @enderror" name="datum" value="{{ old('datum') ?? date('Y-m-d') }}" required autocomplete="datum">

                                    @error('datum')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="store" class="col-md-4 col-form-label text-md-right">{{ __('Winkel') }}</label>

                                <div class="col-md-6">
                                    <select id="store" class="form-control @error('store') is-invalid @enderror" name="store" required autocomplete="store">
                                        @foreach($user->family->stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('store')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>

                                <div class="col-md-6">
                                    <select id="category" class="form-control @error('category') is-invalid @enderror" name="category" required autocomplete="category">
                                        @foreach($user->family->categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->category }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="omschrijving" class="col-md-4 col-form-label text-md-right">{{ __('Omschrijving') }}</label>

                                <div class="col-md-6">
                                    <textarea id="omschrijving" class="form-control @error('datum') is-invalid @enderror" name="omschrijving" required autocomplete="omschrijving" ></textarea>

                                    @error('omschrijving')
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

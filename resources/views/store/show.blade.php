@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Store') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div>{{ __('Name') }}</div>

                            <div class="col-md-6">
                                <div>{{ $store->name }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div>{{ __('Logo') }}</div>

                            <div class="col-md-6">
                                <img src="/storage/{{ $store->logo }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

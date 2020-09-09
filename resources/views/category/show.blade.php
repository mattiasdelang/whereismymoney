@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Categorie') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div>{{ __('Name') }}</div>

                            <div class="col-md-6">
                                <div>{{ $category->name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transacties') }}</div>

                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#eigentransacties" data-toggle="tab">Eigen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#familietransacties" data-toggle="tab">Familie</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="eigentransacties">
                            <ul>
                                <li>- 1000 euro</li>
                                <li>+ 3000 euro</li>
                            </ul>

                        </div>
                        <div class="tab-pane" id="familietransacties">


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Profiel') }}</div>

                <div class="card-body">
                    <div>{{ $user->volledigeNaam() }}</div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    {{ __('Familie') }}
                    @if($user->id === $user->family->owner_id)
                        <a href="{{ @route('user.create') }}">
                            <button type="button" class="btn btn-outline-primary  float-right">Add</button>
                        </a>
                    @endif
                </div>

                <div class="card-body">
                    @php
                        $isErFamilie = 0;
                    @endphp
                    @foreach($user->family->users as $member)
                        @if($member->id !== $user->id && $member->active)
                            <div>{{ $member->volledigeNaam() }}</div>
                            @php
                                $isErFamilie = 1;
                            @endphp
                        @endif
                    @endforeach

                    @if(!$isErFamilie)
                        Je hebt geen familieleden.
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    {{ __('Winkels') }}
                    <a href="{{ @route('store.create') }}">
                        <button type="button" class="btn btn-outline-primary  float-right">Add</button>
                    </a>
                </div>

                <div class="card-body">
                    @forelse($user->family->stores as $store)
                        <div>
                            <a href="{{ route('store.show', ['store' => $store->id]) }}">
                                {{ $store->name }}
                            </a>
                            <a href="{{ route('store.edit', ['store' => $store->id]) }}">
                                <button type="button" class="btn btn-outline-secondary float-right">Edit</button>
                            </a>
                        </div>
                    @empty
                        Je hebt geen winkels.
                    @endforelse
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    {{ __('Categorien') }}
                    <a href="{{ @route('category.create') }}">
                        <button type="button" class="btn btn-outline-primary  float-right">Add</button>
                    </a>
                </div>

                <div class="card-body">
                    @forelse($user->family->categories as $categorie)
                        <div>
                            <a href="{{ route('category.show', ['category' => $categorie->id]) }}">
                                {{ $categorie->category }}
                            </a>
                            <a href="{{ route('category.edit', ['category' => $categorie->id]) }}">
                                <button type="button" class="btn btn-outline-secondary float-right">Edit</button>
                            </a>
                        </div>
                    @empty
                        Je hebt geen categorien.
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('USER Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')
                    @endcomponent

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('logout')
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href=""
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
@endsection

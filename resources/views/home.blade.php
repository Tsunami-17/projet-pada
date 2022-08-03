@extends('layouts.layout', ['title' => 'Home'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>🥳🥳🥳 Bienvenue  {{ auth()->user()->name }} 😉</h1></div>

                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                        <a href="{{url('admin/routes')}}">Admin</a>
                    @else
                        <div class=”panel-heading”>Normal User</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

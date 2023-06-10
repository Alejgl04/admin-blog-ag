@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Update Post</h1>
@stop

@section('content')
<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
</div>

<div class="card">
    <div class="card-body">

    </div>
</div>
@stop



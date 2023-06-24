@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                    @include('admin.posts.partials.form')

                <div class="row mt-4">
                    <div class="col">
                        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop



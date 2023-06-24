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
            {!! Form::model( $post ,['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                    @include('admin.posts.partials.form')

                <div class="row mt-4">
                    <div class="col">
                        {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Create Tag</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.tags.store']) !!}

                @include('admin.tags.partials.form')

                <div class="mt-2">
                    {!! Form::submit('Create Tag', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}


        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection

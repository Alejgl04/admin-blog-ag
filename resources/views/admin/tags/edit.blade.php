@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Edit Tag</h1>
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
            {!! Form::model( $tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

               @include('admin.tags.partials.form')


               <div class="mt-2">
                    {!! Form::submit('Update Tag', ['class' => 'btn btn-primary']) !!}
               </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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

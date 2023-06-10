@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Create Post</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}
                <div class="row">
                    <div class="col">

                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the post name']) !!}

                    </div>
                    <div class="col">

                        {!! Form::label('slug', 'Slug:') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter the slug name', 'readonly' => true]) !!}

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {!! Form::label('category_id', 'Categories:') !!}
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col">
                       <p class="font-weight-bold"> Tags </p>
                       @foreach ($tags as $tag)

                            <label class="mr-2">
                                {!! Form::checkbox('tags[]', $tag->id, null) !!} {{$tag->name}}

                            </label>

                       @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <p class="font-weight-bold">Status</p>

                        <label class="mr-2">
                            {!! Form::radio('status', 1, true) !!}
                            Draft
                        </label>
                        <label>
                            {!! Form::radio('status', 2) !!}
                            Published
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {!! Form::label('extract', 'Extract:') !!}
                        {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col">
                        {!! Form::label('body', 'Body Post:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    ClassicEditor
        .create( document.querySelector( '#extract', ) )
        .catch( error => {
            console.error( error );
    });
    ClassicEditor
        .create( document.querySelector( '#body', ) )
        .catch( error => {
            console.error( error );
    });
    </script>
@endsection


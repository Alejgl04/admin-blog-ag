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
                <div class="row">
                    <div class="col-md-6 col-sm-3">

                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the post name']) !!}
                        <div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">

                        {!! Form::label('slug', 'Slug:') !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter the slug name', 'readonly' => true]) !!}
                        <div>
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-3">
                        {!! Form::label('category_id', 'Categories:') !!}
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                        <div>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                       <p class="font-weight-bold"> Tags </p>
                       @foreach ($tags as $tag)

                            <label class="mr-2">

                                {!! Form::checkbox('tags[]', $tag->id, null) !!} {{$tag->name}}

                            </label>

                       @endforeach
                       <div>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
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
                        <div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <div class="col-md-6 col-sm-3">
                        <div class="image-wrapper">
                            <img id="picture" src="/images/landspace.jpg" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Post image') !!}
                            {!! Form::file('file', [ 'class' => 'form-control', 'accept' => 'image/*']) !!}
                            <div>
                                @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {!! Form::label('extract', 'Extract:') !!}
                        {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

                        <div>
                            @error('extract')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        {!! Form::label('body', 'Body Post:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        <div>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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

    document.getElementById('file').addEventListener('change', changeImage);

    function changeImage( event ){
        const file   = event.target.files[0];
        const reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById('picture').setAttribute('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
    </script>
@endsection


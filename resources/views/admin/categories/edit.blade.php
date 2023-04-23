@extends('adminlte::page')

@section('title', 'AG Blog Systems')

@section('content_header')
    <h1>Update Category</h1>
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
        {!! Form::model( $category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

           <div class="row">
                <div class="col">
                    {!! Form::label('name', 'Category') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the name of the category']) !!}

                    <div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter the name of the slug','readonly' => 'disabled']) !!}

                    <div>
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
           </div>

           <div class="mt-2">
                {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}
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


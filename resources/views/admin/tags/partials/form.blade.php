<div class="row">
    <div class="col">
        {!! Form::label('name', 'Tag') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the name of the tag']) !!}

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
    <div class="col">
        {!! Form::label('color', 'Color') !!}
        {!! Form::select('color', $colors, null, ['class' => 'form-control', 'placeholder' => 'Choose one color']) !!}

        <div>
            @error('color')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

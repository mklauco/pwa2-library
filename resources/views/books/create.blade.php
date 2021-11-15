@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header">{{ __('books.create') }}

        </div>
        
        <div class="card-body">
          
          {!! Form::open(array('route' => 'books.store')) !!}
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                {{ Form::label('name', __('books.name')) }}:
                @if($errors->has('name'))
                {{ Form::text('name', '', ['class' => 'form-control is-invalid']) }}
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @else
                {{ Form::text('name', '', ['class' => 'form-control']) }}
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                {{ Form::label('genre', __('books.genre')) }}:
                @if($errors->has('genre'))
                {{ Form::text('genre', '', ['class' => 'form-control is-invalid']) }}
                @error('genre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @else
                {{ Form::text('genre', '', ['class' => 'form-control']) }}
                @endif
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group ">
                {{ Form::label('description', __('books.description')) }}:
                @if($errors->has('description'))
                {{ Form::textarea('description', '', ['class' => 'form-control is-invalid']) }}
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @else
                {{ Form::textarea('description', '', ['class' => 'form-control']) }}
                @endif
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                {{ Form::label('author', __('books.author')) }}:
                @if($errors->has('author'))
                {{ Form::text('author', '', ['class' => 'form-control is-invalid']) }}
                @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @else
                {{ Form::textarea('author', '', ['class' => 'form-control']) }}
                @endif
              </div>
            </div>
          </div>
          
          <div class="card-footer">
            {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}
          </div>
          
          {!! Form::close() !!}
          
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

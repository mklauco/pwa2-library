@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        
        @if($create == true)
        {!! Form::open(array('route' => 'authors.store')) !!}
        @else
        {!! Form::model($authors, ['route' => ['authors.update', $authors->id], 'method' => 'PUT']) !!}
        @endif
        
        <div class="card-header">
          @if($create == true)
          {{ __('authors.create') }}
          @else
          {{ __('authors.update') }}
          @endif
        </div>
        
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-6">
              @include('templates.form-text', ['space' => 'authors', 'tag' => 'first_name'])
            </div>
            <div class="col-sm-6">
              @include('templates.form-text', ['space' => 'authors', 'tag' => 'last_name'])
            </div>
          </div>
          
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-6">
              {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}
            </div>
          </div>
        </div>
        
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

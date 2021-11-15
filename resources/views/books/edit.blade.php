@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header"><strong>{{__('books.update')}}: {{$books->name}}</strong>
          <div class="card-header-actions">
          </div>

        </div>
        
        <div class="card-body">
          
          {!! Form::model($books, ['route' => ['books.update', $books->id], 'method' => 'PUT']) !!}
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'books', 'tag' => 'name'])
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'books', 'tag' => 'genre'])
            </div>

          </div>
          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-textarea', ['space' => 'books', 'tag' => 'description'])
            </div>
          </div>

          
          <div class="row">
            <div class="col-sm-12">
              @include('templates.form-text', ['space' => 'books', 'tag' => 'author'])
            </div>

          </div>                
          
        </div>
        
        <div class="card-footer">
          {{ Form::submit(__('books.update'), array('class' => 'btn btn-sm btn-primary')) }}
        </div>
        
        {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>
@endsection

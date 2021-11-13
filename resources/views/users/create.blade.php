@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        
        @if($create == true)
        {!! Form::open(array('route' => 'users.store')) !!}
        @else
        {!! Form::model($users, ['route' => ['users.update', $users->id], 'method' => 'PUT']) !!}
        @endif

        <div class="card-header">
          @if($create == true)
          {{ __('users.create') }}
          @else
          {{ __('users.update') }}
          @endif
        </div>
        
        <div class="card-body">

          <div class="row">
            <div class="col-sm-6">
              @include('templates.form-text', ['space' => 'users', 'tag' => 'name'])
            </div>
            
            <div class="col-sm-6">
              @include('templates.form-text', ['space' => 'users', 'tag' => 'email'])
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

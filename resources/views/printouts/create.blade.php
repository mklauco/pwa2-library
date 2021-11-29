@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        
        @if($create == true)
        {!! Form::open(array('route' => 'printouts.store')) !!}
        @else
        {!! Form::model($printouts, ['route' => ['printouts.update', $printouts->id], 'method' => 'PUT']) !!}
        @endif
        
        <div class="card-header">
          @if($create == true)
          {{ __('printouts.create') }}
          @else
          {{ __('printouts.update') }}
          @endif
        </div>
        
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-6">
              @include('templates.form-select', ['space' => 'printouts', 'tag' => 'book_id', 'list' => $bookList])
            </div>
            <div class="col-sm-6">
              @include('templates.form-date', ['space' => 'printouts', 'tag' => 'obtained_at'])
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

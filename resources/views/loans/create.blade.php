@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        
        @if($create == true)
        {!! Form::open(array('route' => 'loans.store')) !!}
        @else
        {!! Form::model($loans, ['route' => ['loans.update', $loans->id], 'method' => 'PUT']) !!}
        @endif
        
        <div class="card-header">
          @if($create == true)
          {{ __('loans.create') }}
          @else
          {{ __('loans.update') }}
          @endif
        </div>
        
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-6">
              @if($create == true)
              @include('templates.form-select', ['space' => 'loans', 'tag' => 'book_printout_id', 'list' => $availableBookList])
              @else
              Book to be returned: <strong>{{$loans->book->name}}</strong>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              @if($create == true)
              @include('templates.form-date', ['space' => 'loans', 'tag' => 'loaned_at'])
              @else
              @include('templates.form-date', ['space' => 'loans', 'tag' => 'returned_at'])
              @endif
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

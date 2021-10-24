@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('books.list') }}
          <div class="card-header-actions">
            <a class="card-header-action" href="{{route('books.create')}}">{{__('books.create')}}</a>
          </div>
        </div>
        
        <div class="card-body">
          
          BOOKS controller
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

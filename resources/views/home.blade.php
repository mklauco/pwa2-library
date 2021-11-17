@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      
      
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $users, 'title' => 'Number of users', 'gradient' => 'primary'])
        </div>

        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $books, 'title' => 'Number of books', 'gradient' => 'info'])
        </div>

        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $authors, 'title' => 'Number of authors', 'gradient' => 'danger'])
        </div>

        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => 0, 'title' => 'n/a', 'gradient' => 'success'])
        </div>

      </div>
      
      
    </div>
  </div>
</div>
@endsection

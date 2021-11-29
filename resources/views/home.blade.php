@extends('layouts.app-coreui')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      
      
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $users, 'title' => 'Number of users', 'gradient' => 'primary'])
        </div>

        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $books, 'title' => 'Number of books', 'gradient' => 'info'])
        </div>

        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $authors, 'title' => 'Number of authors', 'gradient' => 'success'])
        </div>

        <div class="col-sm-6 col-lg-3">
          @include('templates.card-block', ['counter' => $notReturnedBooks, 'title' => 'Not returned books', 'gradient' => 'danger'])
        </div>

      </div>
      
      
    </div>
  </div>
</div>
@endsection

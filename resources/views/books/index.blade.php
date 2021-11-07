@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>list</strong>
          <div class="card-header-actions">
          </div>
        </div>
        
        <div class="card-body">
          
          <div class="row">
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>name</th>
                  <th>description</th>
                  <th>genre</th>
                  <th>author</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($books as $b)
                <tr>
                  <td>{{$b->name}}</td>
                  <td>{{$b->description}}</td>
                  <td>{{$b->genre}}</td>
                  <td>{{$b->author}}</td>
                </tr>                  
                @endforeach
              </tbody>
            </table>            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

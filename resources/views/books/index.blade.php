@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{__('books.list')}}</strong>
          <div class="card-header-actions">
            <a href="{{route('books.create')}}">Add book</a>
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
                  <th>created_at</th>
                  <th>updated_at</th>
                  <th colspan="2">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($books as $b)
                <tr>
                  <td>{{$b->name}}</td>
                  <td>{{$b->description}}</td>
                  <td>{{$b->genre}}</td>
                  <td>{{$b->author}}</td>
                  <td>{{Carbon\Carbon::parse($b->created_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                  <td>{{Carbon\Carbon::parse($b->updated_at)->tz('Europe/Berlin')->format('G:i:s d.m.Y')}}</td>
                  <td><a href="{{route('books.edit', $b->id)}}">{{__('books.edit')}}</a></td>
                  <td>
                    @if($b->deleted_at == null)
                    {!! Form::open(array('route' => ['books.destroy', $b->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('books.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                    {!! Form::close() !!}     
                    @endif         
                  </td>
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

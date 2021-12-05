@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{ __('books.list') }}</strong>
          <div class="card-header-actions">
            <a class="theme-color" href="{{route('books.export.excel')}}">
              <i class="cil-note-add"></i>&nbsp;{{__('books.download_excel')}}
            </a>
            <a class="theme-color" href="{{route('books.create')}}"><i class="cil-note-add"></i>&nbsp;{{__('books.create')}}</a>
          </div>
        </div>
        
        <div class="card-body">
          <div class="row">
            @if($books->count() > 0)
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th class="text-muted">{{__('general.id')}}</th>
                  <th>{{__('books.name')}}</th>
                  <th>{{__('books.description')}}</th>
                  <th>{{__('books.genre')}}</th>
                  <th>{{__('books.author')}}</th>
                  <th>{{__('books.no_printouts')}}</th>
                  <th colspan="2">{{__('books.actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($books as $b)
                <tr>
                  <td class="text-muted">{{$b->id}}</td>
                  <td>{{$b->name}}</td>
                  <td>{{$b->description}}</td>
                  <td>{{$b->genre}}</td>
                  <td>{{$b->author_first_name}}&nbsp;{{$b->last_first_name}}</td>
                  <td>{{$b->printouts->count()}}</td>
                  <td>{!! Html::linkRoute('books.edit', __('books.edit'), ['book' => $b->id], array('class' => 'theme-color' )) !!}</td>
                  <td>
                    {!! Form::open(array('route' => ['books.destroy', $b->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('books.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                    {!! Form::close() !!}
                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table> 
            {{ $books->links('vendor.pagination.bootstrap-4') }}
            @else
            Start with insert a book into the database.
            @endif
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

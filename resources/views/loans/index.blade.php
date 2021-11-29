@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{ __('loans.list') }}</strong>
          <div class="card-header-actions">
            <a class="theme-color" href="{{route('loans.create')}}"><i class="cil-note-add"></i>&nbsp;{{__('loans.create')}}</a>
          </div>
        </div>
        
        <div class="card-body">
          <a href="{{route('book.report.simplePDF')}}">Download report</a>
          {{-- User name, Book Title, Loaned at, Returned at, Loan length --}}
          <div class="row">
            @if($loans->count() > 0)
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>{{__('users.name')}}</th>
                  <th>{{__('books.name')}}</th>
                  <th>{{__('loans.loaned_at')}}</th>
                  <th>{{__('loans.returned_at')}}</th>
                  <th>{{__('loans.loan_length')}}</th>
                  <th colspan="2">{{__('loans.actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($loans as $b)
                <tr> 
                  <td>{{$b->user->last_name}}</td>
                  <td>{{$b->book->name}}</td>
                  <td>{{Carbon\Carbon::parse($b->loan->loaned_at)->tz('Europe/Berlin')->format('G:i:s d.m.Y')}}</td>
                  <td>
                    @if(is_null($b->returned_at) == true)
                    {{__('loans.not_returned')}}
                    @else
                    {{Carbon\Carbon::parse($b->returned_at)->tz('Europe/Berlin')->format('G:i:s d.m.Y')}}
                    @endif
                  </td>
                  <td> {{ $loanLength[$b->id] }}</td> 
                  <td><a href="{{route('loans.edit', $b->id)}}">{{__('loans.edit')}}</a></td>
                  <td>
                    @if($b->deleted_at == null)
                    {!! Form::open(array('route' => ['loans.destroy', $b->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('loans.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                    {!! Form::close() !!}     
                    @endif         
                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table> 
            {{-- {{ $loans->links('vendor.pagination.bootstrap-4') }} --}}
            @else
            Start by inserting the book into the database
            @endif           
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

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
          <dl class="row">
            <dt class="col-sm-3">Number of loans:</dt>
            <dd class="col-sm-9">{{$loans->count()}}</dd>

            <dt class="col-sm-3">Date of earliest loaned book</dt>
            <dd class="col-sm-9">{{$bookParams['earliestLoan']->loaned_at}}</dd>

            <dt class="col-sm-3">Date of latest returned book</dt>
            <dd class="col-sm-9">{{$bookParams['latestReturn']->returned_at}}</dd>

            <dt class="col-sm-3">Book with the highest loan count:</dt>
            <dd class="col-sm-9">{{$bookParams['bookHighestCount']}}</dd>

            <dt class="col-sm-3">User with the highest loan count:</dt>
            <dd class="col-sm-9">{{$bookParams['userHighestCount']}}</dd>

            <dt class="col-sm-3">Number of books with longer than 30-day return period:</dt>
            <dd class="col-sm-9">{{$longerThan30}}</dd> 
          </dl>
          @if($loans->count() > 0)
          <table class="table">
            <thead>
              <tr>
                <th class="text-muted">{{__('general.id')}}</th>
                <th>{{__('users.name')}}</th>
                <th>{{__('books.name')}}</th>
                <th>{{__('loans.loans_length')}}</th>
                <th>{{__('loans.loaned_at')}}</th>
                <th>{{__('loans.returned_at')}}</th>
                <th>{{__('general.created_at')}}</th>
                <th>{{__('general.updated_at')}}</th>
                <th colspan="2">{{__('general.actions')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($loans as $b)
              <tr @if(!is_null($b->deleted_at)) class="text-black-50" @endif>
                <td class="text-muted">{{$b->id}}</td>
                <td>{{$b->user->first_name}}&nbsp;{{$b->user->last_name}}</td>
                <td>{{$b->book->name}}</td>
                <td>{{$loanLength[$b->id]}}</td>
                <td>{{Carbon\Carbon::parse($b->loan->loaned_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                <td>{{Carbon\Carbon::parse($b->returned_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                <td>{{Carbon\Carbon::parse($b->created_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                <td>{{Carbon\Carbon::parse($b->updated_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                <td>{!! Html::linkRoute('loans.edit', __('general.edit'), ['loan' => $b->id], array('class' => 'theme-color' )) !!}</td>
                <td>
                  {!! Form::open(array('route' => ['loans.destroy', $b->id], 'method'=>'DELETE')) !!}
                  {!! Form::submit(__('general.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'style' => 'line-height: 20px;', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                  {!! Form::close() !!}
                </td>
              </tr>                  
              @endforeach
            </tbody>
          </table> 
          @else
          Start with inserting an author into the databse.
          @endif
          
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

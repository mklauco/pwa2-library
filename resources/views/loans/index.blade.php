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
          @if($loans->count() > 0)
          <table class="table">
            <thead>
              <tr>
                <th class="text-muted">{{__('general.id')}}</th>
                <th>{{__('users.name')}}</th>
                <th>{{__('books.name')}}</th>
                <th>{{__('loans.loaned_at')}}</th>
                <th>{{__('general.created_at')}}</th>
                <th>{{__('general.updated_at')}}</th>
                <th colspan="2">{{__('general.actions')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($loans as $b)
              <tr @if(!is_null($b->deleted_at)) class="text-black-50" @endif>
                <td class="text-muted">{{$b->id}}</td>
                <td>{{$b->user->name}}</td>
                <td>n/a</td>
                <td>{{$b->loaned_at}}</td>
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

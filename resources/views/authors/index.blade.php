@extends('layouts.app-coreui')

@section('content')
<div class="container">
  
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{ __('authors.list') }}</strong>
          <div class="card-header-actions">
            <a class="theme-color" href="{{route('authors.create')}}"><i class="cil-note-add"></i>&nbsp;{{__('authors.create')}}</a>
          </div>
        </div>
        <div class="card-body">
          @if($authors->count() > 0)
          <table class="table">
            <thead>
              <tr>
                <th>{{__('authors.name')}}</th>
                <th>{{__('general.created_at')}}</th>
                <th>{{__('general.updated_at')}}</th>
                <th colspan="2">{{__('general.actions')}}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($authors as $b)
              <tr @if(!is_null($b->deleted_at)) class="text-black-50" @endif>
                <td>{{$b->first_name}}&nbsp;{{$b->last_name}}</td>
                <td>{{Carbon\Carbon::parse($b->created_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                <td>{{Carbon\Carbon::parse($b->updated_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                <td>{!! Html::linkRoute('authors.edit', __('general.edit'), ['author' => $b->id], array('class' => 'theme-color' )) !!}</td>
                <td>
                  {!! Form::open(array('route' => ['authors.destroy', $b->id], 'method'=>'DELETE')) !!}
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

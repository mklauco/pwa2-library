@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{ __('users.list') }}</strong>
          <div class="card-header-actions">
            <a class="theme-color" href="{{route('users.create')}}"><i class="cil-note-add"></i>&nbsp;{{__('users.create')}}</a>
          </div>
        </div>
        
        <div class="card-body">
          
          <div class="row">
            @if($users->count() > 0)
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>{{__('users.name')}}</th>
                  <th>{{__('users.email')}}</th>
                  <th>{{__('general.created_at')}}</th>
                  <th>{{__('general.updated_at')}}</th>
                  <th colspan="2">{{__('general.actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $b)
                <tr>
                  <td>{{$b->name}}</td>
                  <td>{{$b->email}}</td>
                  <td>{{Carbon\Carbon::parse($b->created_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                  <td>{{Carbon\Carbon::parse($b->updated_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                  <td>{!! Html::linkRoute('users.edit', __('general.edit'), ['user' => $b->id], array('class' => 'theme-color' )) !!}</td>
                  <td>
                    {!! Form::open(array('route' => ['users.destroy', $b->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('general.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                    {!! Form::close() !!}
                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table> 
            @else
            Start with insert a user into the databse.
            @endif
            
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

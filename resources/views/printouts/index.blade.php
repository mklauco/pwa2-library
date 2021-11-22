@extends('layouts.app-coreui')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header"><strong>{{ __('printouts.list') }}</strong>
          <div class="card-header-actions">
            <a class="theme-color" href="{{route('printouts.create')}}"><i class="cil-note-add"></i>&nbsp;{{__('printouts.create')}}</a>
          </div>
        </div>
        
        <div class="card-body">

          
          <div class="row">
            @if($printouts->count() > 0)
            <table class="table table-responsive-sm">
              <thead>
                <tr>
                  <th>{{__('printouts.name')}}</th>
                  <th>{{__('printouts.obtained_at')}}</th>
                  <th>{{__('printouts.created_at')}}</th>
                  <th>{{__('printouts.updated_at')}}</th>
                  <th colspan="2">{{__('printouts.actions')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($printouts as $b)
                <tr>
                  <td>{{$b->book->name}}</td>
                  <td>{{Carbon\Carbon::parse($b->obtained_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                  <td>{{Carbon\Carbon::parse($b->created_at)->tz('Europe/Berlin')->toDateTimeString()}}</td>
                  <td>{{Carbon\Carbon::parse($b->updated_at)->tz('Europe/Berlin')->format('G:i:s d.m.Y')}}</td>
                  <td><a href="{{route('printouts.edit', $b->id)}}">{{__('printouts.edit')}}</a></td>
                  <td>
                    @if($b->deleted_at == null)
                    {!! Form::open(array('route' => ['printouts.destroy', $b->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('printouts.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
                    {!! Form::close() !!}     
                    @endif         

                  </td>
                </tr>                  
                @endforeach
              </tbody>
            </table> 
            {{ $printouts->links('vendor.pagination.bootstrap-4') }}
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

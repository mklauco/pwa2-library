@php
 $value = Carbon\Carbon::parse($$space[$tag] ?? now())->toDate();
@endphp
<div class="form-group">
  {{ Form::label($tag, __($space.'.'.$tag)) }}:
  @if(Auth::user()->debug == 1)&nbsp;<span class="text-black-50">"{{$tag}}"</span>@endif
  @if($errors->has($tag))
  {{ Form::date($tag, $value, ['class' => 'form-control is-invalid']) }}
  @error($tag)
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @else
  {{ Form::date($tag, $value, ['class' => 'form-control']) }}
  @endif
</div>
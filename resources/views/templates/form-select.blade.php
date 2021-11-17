<div class="form-group">
  {{ Form::label($tag, __($space.'.'.$tag)) }}:
  @if(Auth::user()->debug == 1)&nbsp;<span class="text-black-50">"{{$tag}}"</span>@endif
  @if($errors->has($tag))
  {{ Form::select($tag, $list ?? ['0' => '0'], $$space[$tag] ?? '', ['class' => 'form-control is-invalid']) }}
  @error($tag)
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @else
  {{ Form::select($tag, $list ?? ['0' => '0'], $$space[$tag] ?? '', ['class' => 'form-control']) }}
  @endif
</div>
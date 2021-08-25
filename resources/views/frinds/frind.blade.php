@extends('layouts.app')

@section('content')


<nav>
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>


<div class="container">
    <form action="{{ route('user.insert') }}" method="POST">
        @csrf

        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name') }}</label>
          <input type="text" class="form-control" name="name" placeholder="{{ __('messages.name') }}">
            @error('name')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>
        <div class="mb-3">
          <label class="form-label">{{ __('messages.Full') }}</label>
          <input type="text" class="form-control" name="full" placeholder="{{ __('messages.Full') }}">
            @error('full')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Date') }} </label>
          <input type="datetime-local" class="form-control" name="date" placeholder="{{ __('messages.Date') }}">
            @error('date')
                  <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned') }} </label>
          <input type="text" class="form-control" name="needed" placeholder="{{  __('messages.Ned') }}">
            @error('needed')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"> {{ __('messages.save') }} </button>
      </form>
</div>
@endsection

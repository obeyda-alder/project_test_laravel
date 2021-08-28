@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('user.Update', $ider->id) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}

        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name ar') }}</label>
          <input type="text" class="form-control" value="{{ $ider->frind_name_ar }}" name="name_ar" placeholder="{{ __('messages.name ar') }}"  required  autofocus>
            @error('name_ar')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name en') }}</label>
          <input type="text" class="form-control" name="name_en" value="{{ $ider->frind_name_en }}" placeholder="{{ __('messages.name en') }}" required>
            @error('name_en')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
          <label class="form-label">{{ __('messages.Full') }}</label>
          <input type="text" class="form-control" name="full" value="{{ $ider->Full_name }}" placeholder="{{ __('messages.Full') }}" required>
            @error('full')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Date') }} </label>
          <input type="datetime-local" class="form-control" name="date" value="{{ old('time') ?? date('Y-m-d\TH:i', strtotime($ider->Date)) }}" placeholder="{{ __('messages.Date') }}" required>
            @error('date')
                  <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned ar') }} </label>
          <input type="text" class="form-control" name="needed_ar" value="{{ $ider->what_need_ar }}" placeholder="{{  __('messages.Ned ar') }}" required>
            @error('needed_ar')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned en') }} </label>
          <input type="text" class="form-control" name="needed_en" value="{{ $ider->what_need_en }}" placeholder="{{  __('messages.Ned en') }}" required>
            @error('needed_en')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary"> {{ __('messages.save') }} </button>
      </form>
</div>
@endsection

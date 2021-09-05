@extends('layouts.app')

@section('content')

 <div class="container mt-5 mb-5 p-3">


    <div id="succ" class="alert alert-success " style="display: none">
        successfully Updating
    </div>

    <form action="" method="POST" class="EditForm" enctype="multipart/form-data">
        @csrf

        <input type="hidden" value="{{ $data->id }}" name="id">

        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name ar') }}</label>
          <input type="text" class="form-control name_ar" value="{{ $data->frind_name_ar }}" name="name_ar" placeholder="{{ __('messages.name ar') }}">
            @error('name_ar')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name en') }}</label>
          <input type="text" class="form-control name_en" name="name_en" value="{{ $data->frind_name_en }}" placeholder="{{ __('messages.name en') }}">
            @error('name_en')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
          <label class="form-label">{{ __('messages.Full') }}</label>
          <input type="text" class="form-control full" name="full" value="{{ $data->Full_name }}" placeholder="{{ __('messages.Full') }}">
            @error('full')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Date') }} </label>
          <input type="datetime-local" class="form-control date" name="date" value="{{ old('time') ?? date('Y-m-d\TH:i', strtotime($data->Date)) }}" placeholder="{{ __('messages.Date') }}">
            @error('date')
                  <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned ar') }} </label>
          <input type="text" class="form-control need_ar" name="needed_ar" value="{{ $data->what_need_ar }}" placeholder="{{  __('messages.Ned ar') }}">
            @error('needed_ar')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned en') }} </label>
          <input type="text" class="form-control need_en" name="needed_en" value="{{ $data->what_need_en }}" placeholder="{{  __('messages.Ned en') }}">
            @error('needed_en')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.photo') }} </label>
          <input type="file" class="form-control photo" name="photo" value="{{ $data->photo }}" placeholder="{{  __('messages.photo') }}">
            @error('photo')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <img src="{{asset('/images/frinds/'.$data->photo) }}" class="thumbnail_img">


        <button id="Update" class="btn btn-success"> Updata </button>
      </form>
 </div>

 @endsection



 @section('script')
<script>
 $(function() {

         $('#Update').on('click', function (e) {
             e.preventDefault();
             let forms = new FormData($('.EditForm')[0]);

           $.ajax({
               type:"POST",
               url: "{{ route('Ajax-frinds.update') }}",
               enctype: "multipart/form-data",
               data: forms,
               processData: false,
               contentType: false,
               cache: false,
               success: function(data){

                   if(data.status == true){

                       $( "#succ" ).show( "slow");

                      console.log('this is 200');

                   }
               },
               error:function (reject){


                   if(data.status == false){

                   console.log('this is 500');
                   console.log('this is test');

                     }
               }
           });
       });
     });
    </script>
 @endsection

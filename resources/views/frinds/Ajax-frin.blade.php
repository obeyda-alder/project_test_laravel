@extends('layouts.app')

@section('content')

 <div class="container mt-5 mb-5 p-3">


    <div id="succ" class="alert alert-success " style="display: none">
        successfully
    </div>

    <form action="" method="POST" class="CreateForm" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name ar') }}</label>
          <input type="text" class="form-control name_ar" name="name_ar" placeholder="{{ __('messages.name ar') }}">

                <div id="name_ar_error" class="form-text text-danger"></div>

        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name en') }}</label>
          <input type="text" class="form-control name_en" name="name_en" placeholder="{{ __('messages.name en') }}">

                <div id="name_en_error" class="form-text text-danger"></div>

        </div>


        <div class="mb-3">
          <label class="form-label">{{ __('messages.Full') }}</label>
          <input type="text" class="form-control full" name="full" placeholder="{{ __('messages.Full') }}">

                <div id="full_error"class="form-text text-danger"></div>

        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Date') }} </label>
          <input type="datetime-local" class="form-control date" name="date" placeholder="{{ __('messages.Date') }}">

                  <div id="date_error" class="form-text text-danger"></div>

        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned ar') }} </label>
          <input type="text" class="form-control need_ar" name="needed_ar" placeholder="{{  __('messages.Ned ar') }}">

                    <div id="needed_ar_error" class="form-text text-danger"></div>

        </div>

        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned en') }} </label>
          <input type="text" class="form-control need_en" name="needed_en" placeholder="{{  __('messages.Ned en') }}">

                    <div id="needed_en_error" class="form-text text-danger"></div>

        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.photo') }} </label>
          <input type="file" class="form-control photo" name="photo" placeholder="{{  __('messages.photo') }}">

                    <div id="photo_error" class="form-text text-danger"></div>

        </div>


        <button id="save" class="btn btn-primary"> {{ __('messages.save') }} </button>
      </form>
 </div>

 @endsection



 @section('script')
<script>
 $(function() {

         $('#save').on('click', function (e) {
             e.preventDefault();


                // Empty fields on click
              $('#photo_error').text('');
              $('#name_ar_error').text('');
              $('#name_en_error').text('');
              $('#needed_ar_error').text('');
              $('#needed_en_error').text('');
              $('#full_error').text('');
              $('#date_error').text('');

             let form = new FormData($('.CreateForm')[0]);

           $.ajax({
               type:"POST",
               url: "/Ajax-frinds/store",
               enctype: "multipart/form-data",
               data: form,
               processData: false,
               contentType: false,
               cache: true,
               success: function(data){

                      console.log('this is 201');

                   if(data.status == true){

                       $( "#succ" ).show( "slow");
                      console.log('this is 200');


                   }else if(data.status == false){

                      console.log('this is 500');

                        console.log(data.errors);
                        console.log(data.status);
                        console.log(data.msg);

                    $.each(data.errors , function (key,value){
                        $('#' + key + '_error').text(value[0]);
                    });

                   }
               },
               error:function (data){

                      console.log('this is 501');
                }

           });
       });
     });
    </script>
 @endsection

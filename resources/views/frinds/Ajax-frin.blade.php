<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

 <div class="container mt-5 mb-5 p-3">

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name ar') }}</label>
          <input type="text" class="form-control name_ar" name="name_ar" placeholder="{{ __('messages.name ar') }}">
            @error('name_ar')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">{{ __('messages.name en') }}</label>
          <input type="text" class="form-control name_en" name="name_en" placeholder="{{ __('messages.name en') }}">
            @error('name_en')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
          <label class="form-label">{{ __('messages.Full') }}</label>
          <input type="text" class="form-control full" name="full" placeholder="{{ __('messages.Full') }}">
            @error('full')
                <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Date') }} </label>
          <input type="datetime-local" class="form-control date" name="date" placeholder="{{ __('messages.Date') }}">
            @error('date')
                  <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned ar') }} </label>
          <input type="text" class="form-control need_ar" name="needed_ar" placeholder="{{  __('messages.Ned ar') }}">
            @error('needed_ar')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" > {{ __('messages.Ned en') }} </label>
          <input type="text" class="form-control need_en" name="needed_en" placeholder="{{  __('messages.Ned en') }}">
            @error('needed_en')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label" > {{ __('messages.photo') }} </label>
          <input type="file" class="form-control photo" name="photo" placeholder="{{  __('messages.photo') }}">
            @error('photo')
                    <q class="form-text text-danger">{{ $message }}</q>
            @enderror
        </div>


        <button id="save" class="btn btn-primary"> {{ __('messages.save') }} </button>
      </form>
 </div>




 </div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>

$(function() {

        $('#save').on('click', function (e) {
            e.preventDefault();

          $.ajax({
              type:"POST",
              url: "/Ajax-frinds/store",
              data: {
                  '_token' : "{{ csrf_token() }}",
                    'name_ar' :   $('.name_ar').val(),
                    'name_en' :   $('.name_en').val(),
                    'full' :       $('.full').val(),
                    'date' :            $('.date').val(),
                    'needed_ar':     $('.need_ar').val(),
                    'needed_en':     $('.need_en').val(),
                    'photo':            $('.photo').val(),
              },
              success: function(data){
                  console.log('this is 200');
              },
              error:function (reject){

                  console.log('this is 500');
                  console.log($('.name_ar').val());
                  console.log($('.name_en').val());
                  console.log($('.full').val());
                  console.log($('.date').val());
                  console.log($('.need_ar').val());
                  console.log($('.need_en').val());
                  console.log($('.photo').val());
              }

          });

      });
    });
  </script>
</body>
</html>

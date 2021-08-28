@extends('layouts.app')

@section('content')


<div class="container">



    {{-- @foreach ( $event as $item) --}}
    <p>Number of video views {{$event->views}}</p>

    {{-- <button type="submit" >click</button> --}}
    {{-- <a href="{{ route('user.ShowVideo.Count')}}"> Reset the count To 1</a> --}}
    {{-- @endforeach --}}



    {{-- reset value views = 1 if views = 100 -sds-}}--
    {{-- <span class="d-block mt-3 mb-4 btn btn-info text-center">
        @if ($event->views == 100)
            @php
                use App\http\Controllers\InsertDB;
                $restee = new InsertDB;
                echo $restee->Reset();
            @endphp
        @else
            <p>Welcome Here</p>
        @endif
      </span> --}}



    <iframe width="560" height="315" src="https://www.youtube.com/embed/GVNDbTwOSiw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</div>
@endsection

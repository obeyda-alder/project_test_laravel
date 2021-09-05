@extends('layouts.app')

@section('content')

 <div class="container mt-5 mb-5 p-3">

      @if(Session::has('message'))
            <div class="alert alert-success text-center">
                {{ Session::get('message') }}
            </div>
        @endif

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($serves)  && $serves->count() > 0)
                @foreach ($serves as $serve)
                     <tr>
                        <td>{{ $serve->id }}</td>
                        <td>{{ $serve->name }}</td>
                     </tr>
                @endforeach
            @endif
        </tbody>
    </table>


    <div class="mt-5 mb-5 p-3">


        <div class="alert alert-info ">
            Add Services To the Doctor
        </div>



    <form action="{{ route('Add_Services', ['id' => $id]) }}" method="POST" >
        @csrf


        <div class="mb-3">
            <label class="form-label" >Services</label>
            <select name="select_box[]" class="form-control" multiple >

                @foreach ($services as $service)
                   <option value="{{ $service->id }}">{{  $service->name }}</option>
                @endforeach
            </select>
        </div>

        <button  class="btn btn-info"> Add </button>
      </form>
 </div>



 </div>

 @endsection

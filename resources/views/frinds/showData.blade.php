@extends('layouts.app')

@section('content')


<div class="container">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Full Name</th>
            <th scope="col">Date</th>
            <th scope="col">need</th>
            <th scope="col">photo</th>
            <th scope="col">Controll</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->frind_name }}</td>
                <td>{{ $item->Full_name }}</td>
                <td>{{ $item->Date }}</td>
                <td>{{ $item->what_need }}</td>
                <td><img class="thumbnail" src="{{ asset('images/frinds/'.$item->photo) }}"></td>
                <td>
                    <a href="{{ url('user/edit/'.$item->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{ route('user.Delete' , $item->id) }}" class="btn btn-info">delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>

</div>
@endsection

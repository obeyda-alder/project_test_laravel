@extends('layouts.app')

@section('content')

 <div class="container mt-5 mb-5 p-3">
    <table class="table">
        <thead>
            <tr>
            <th scope="col"> #ID</th>
            <th scope="col"> Name</th>
            <th scope="col"> Address</th>
            <th scope="col"> doctors available</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($Hospitals) && $Hospitals->count() > 0)
               @foreach ($Hospitals as $Hospital)
                <tr>
                    <td>{{ $Hospital->id }}</td>
                    <td>{{ $Hospital->name }}</td>
                    <td>{{ $Hospital->address }}</td>
                    <td>
                        <div class="row">
                            <div class="col-cm-3">
                                <a href="{{ url('DoctorsPage', $Hospital->id ) }}" class="btn btn-info ">doctors available</a>
                            </div>
                            <div class="col-cm-3">
                                <a href="{{ url('DeleteHospital', $Hospital->id ) }}" class="btn btn-danger ml-2 ">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
               @endforeach
            @endif
        </tbody>
    </table>
 </div>

 @endsection

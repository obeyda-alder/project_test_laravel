@extends('layouts.app')

@section('content')

 <div class="container mt-5 mb-5 p-3">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($Doctors)  && $Doctors->count() > 0)
                @foreach ($Doctors as $Doctor)
                     <tr>
                        <td>{{ $Doctor->id }}</td>
                        <td>{{ $Doctor->name }}</td>
                        <td>{{ $Doctor->title }}</td>
                         <td>
                        <div class="row">
                            <div class="col-cm-3">
                                <a href="{{ route('Services',  $Doctor->id ) }}" class="btn btn-info">Services</a>
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

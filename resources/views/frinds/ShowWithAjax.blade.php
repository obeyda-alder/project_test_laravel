@extends('layouts.app')

@section('content')


<div class="container">

    <div id="succ" class="alert alert-success " style="display: none">
        Deleted
    </div>

    <div id="wrong" class="alert alert-danger " style="display: none; margin:auto;top:20%;left:150px;color:#FFF;">
        The Id Not Found Sorry ->>
    </div>

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
            <tr class="remove_Elem{{ $item->id }}">
                <td>{{ $item->id }}</td>
                <td>{{ $item->frind_name }}</td>
                <td>{{ $item->Full_name }}</td>
                <td>{{ $item->Date }}</td>
                <td>{{ $item->what_need }}</td>
                <td><img class="thumbnail" src="{{ asset('images/frinds/'.$item->photo) }}"></td>
                <td>
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="{{ url('user/edit/'.$item->id) }}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="col-sm-3">
                             <a href="{{ route('user.Delete' , $item->id) }}" class="btn btn-danger">delete</a>
                            </div>
                        <div class="col-sm-3">
                            <a href="" custom_id="{{ $item->id }}" class="delete_aj btn btn-danger">Ajax Delete</a>
                        </div>
                        <div class="col-sm-3">
                            <a href="{{ route('Ajax-frinds.edit', $item->id) }}"  class=" btn btn-info">Ajax Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>

</div>

@endsection


@section('script')
<script>
$(function() {

      $('.delete_aj').on('click', function (e) {
          e.preventDefault();

          let custom = $(this).attr('custom_id');

        $.ajax({
            type:"POST",
            url: "/Ajax-frinds/delete",
            data: {
                _token: '{{ csrf_token() }}',
                'id' : custom,
            },
            success: function(data){

                if(data.status == true){

                    $( "#succ" ).show( "slow");

                    $('.remove_Elem'+data.id).remove();

                   console.log('this is 200');

                }
            },
            error:function (data){


                if(data.status == false){

                console.log('this is 500');
                    $( "#wrong" ).show( "slow");
                  }
            }
        });
    });
  });
</script>
@endsection

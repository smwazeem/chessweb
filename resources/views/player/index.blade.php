@extends('admin.template')
@section('content')

@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

<table class="table table-striped">
    <tr>
        <th class="wd-15p ">PlayerID</th>
        <th class="wd-15p ">Full Name</th>
        <th class="wd-15p ">Name with Initial or Team Name</th>
        <th class="wd-15p ">Gender</th>
        <th class="wd-15p ">Insitution</th>
        <th class="wd-15p ">Date of Birth</th>
        <th class="wd-15p ">Tournament Name</th>
        <th colspan="3">Actions</th>
    </tr>

    @foreach($players as $player)
    <tr>
        <td>  {{$player->id}}</td>
        <td>  {{$player->playername}}</td>
        <td>  {{$player->namewithInitial}}</td>
        <td>  {{$player->gender}}</td>
        <td>  {{$player->insitution}}</td>
        <td>  {{$player->dob}}</td>
        <td>  {{optional($player->tournament)->name}}</td>
        <td>
        <form action= "{{route('player.destroy',$player->id)}}" method = "post">
            <input type = "hidden" name = "_method" value = "delete">
            {{csrf_field()}}
            <input type ="Submit" value = "Delete" class="btn btn-sm btn-danger">
          </form>
        </td>
        <td>
            <form action= "{{route('player.edit',$player->id)}}" method = "get" >
            {{csrf_field()}}
                <input type ="Submit" value = "Edit"  class="btn btn-sm btn-success">
            </form>
        </td>
        <td>
            <a href = "{{route('player.show',$player->id)}}" class="btn btn-sm btn-primary">Show</a>
        </td>

    </tr>
    @endforeach
    <tr>
        <td>
            <form action= "{{route('player.create')}}" method = "get">
                <input type ="Submit" value = "Add Player" />
            </form>
        </td>
        </tr>
    </table>
    <br><br>
@endsection
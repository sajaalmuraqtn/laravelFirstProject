@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">


        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Operation</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $key)
                <tr>
                  <td>{{$key->id}}</th>
                  <td>{{$key->name}}</td>
                  <td>{{$key->role}}</td>
                  <td><a class="btn btn-info btn-sm" href="{{ route('user.edit',['id'=>$key->id]) }}">edit</a></td>
                   </tr>
                @endforeach
            </tbody>
        </table>
        @if (Route::has('add'))
            <a class="btn btn-primary col-md-2 " href="{{ route('add') }}">{{ __('Add User') }}</a>
        @endif



    </div>
</div>
@endsection

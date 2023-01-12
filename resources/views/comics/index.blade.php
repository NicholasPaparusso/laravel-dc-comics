@extends('layouts.main')

@section('content')
<h1 class="py-3 text-center">Comics Table </h1>

<div class="container">
    <table class="table ">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Show</th>
            <th scope="col">Modify</th>
            <th scope="col">Discard</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($comics as $comic )
            <tr>
                <td>{{$comic['id']}}</td>
                <td><a href="{{route('comics.show', $comic->id)}}">{{$comic['title']}}</a></td>
                <td>{{$comic['type']}}</td>
                <td>${{$comic['price']}}</td>
                <td><a class="btn btn-info text-white" href="{{route('comics.show', $comic->id)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                <td><a class="btn btn-warning text-white" href="#"><i class="fa-solid fa-pencil"></i></a></td>
                <td><a class="btn btn-danger" href="#"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            @endforeach

        </tbody>
      </table>
      {{ $comics->links() }}
</div>
@include('partials.add')
@endsection

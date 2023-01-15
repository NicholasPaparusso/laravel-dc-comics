@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-center">
    <h1 class=" ">Comics Table @include('partials.add') </h1>
</div>

<div class="container">
    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif
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

            @forelse ($comics as $comic )
            <tr>
                <td>{{$comic['id']}}</td>
                <td><a href="{{route('comics.show', $comic->id)}}">{{$comic['title']}}</a></td>
                <td>{{$comic['type']}}</td>
                <td>${{$comic['price']}}</td>

                <td>
                    <a class="btn btn-info text-white" href="{{route('comics.show', $comic->id)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                </td>

                <td>
                    @include('partials.edit', $comic)
                </td>
                <td>
                    @include('partials.delete' ,['id'=> $comic->id])
                </td>
            </tr>

            @empty
            <h5>
                Nessun prodotto trovato del DB
            </h5>
            @endforelse
            <tr>
                <td>#</td>
                <td>
                    <a class="mx-3" href="{{route('comics.create')}}">Add New Comic</a>
                    @include('partials.add-plus')
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>
            </tr>
        </tbody>
      </table>
      {{ $comics->links() }}
</div>

@endsection

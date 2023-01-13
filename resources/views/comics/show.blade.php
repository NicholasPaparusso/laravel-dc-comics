@extends('layouts.main')

@section('content')
    <h3 class="text-center py-3">Details Page</h3>
    <div class="container d-flex justify-content-center ">

        <div class="card mt-3 d-flex flex-row " style="width: 60rem;">
            <img src="{{$comic->thumb}}" class="np-img" alt="...">
            <div class="card-body w-50">
              <h5 class="card-title">
                {{$comic->title}}
              </h5>
              <p class="card-text">{{$comic->series}} - {{$comic->type}}</p>
              <p class="card-text">${{$comic->price}}</p>
              <p class="card-text ">{{$comic->description}}</p>

              <div class="button-container d-flex py-3 gap-4">

                @include('partials.delete', ['id' => $comic->id])

                <a href="{{route('comics.index')}}" class="btn btn-primary "><i class="fa-solid fa-house"></i></a>

                @include('partials.edit')
              </div>

            </div>
          </div>
    </div>

    @include('partials.add')
@endsection

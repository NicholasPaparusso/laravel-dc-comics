@extends('layouts.main')

@section('content')
<h3 class="text-center py-3">Edit Comic: {{$comic->title}}</h3>

<div class="container d-flex justify-content-center">
    <form class="d-flex flex-column w-50" action="{{route('comics.update', $comic)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Add Title</label>
        <input class="mb-3" type="text" name="title" id="title"
        value="{{$comic->title}}"
        >

        <label for="description">Add Description</label>
        <textarea class="mb-3"  name="description" id="description">{{$comic->description}}
        </textarea>

        <label for="thumb">Add Thumb</label>
        <input class="mb-3 w-100" type="text" name="thumb" id="thumb"
        value="{{$comic->thumb}}"
        >


        <label for="price">Add Price</label>
        <input class="mb-3" type="number"
        step=0.01
        name="price" id="price"
        value="{{$comic->price}}"
        >

        <label for="series">Add Series</label>
        <input class="mb-3" type="text" name="series" id="series"
        value="{{$comic->series}}"
        >

        <label for="sale_date">Add Sale Date</label>
        <input class="mb-3" type="date" name="sale_date" id="sale_date"
        value="{{$comic->sale_date}}"
        >

        <label for="type">Add Type</label>
        <input class="mb-3" type="text" name="type" id="type"
        value="{{$comic->type}}"
        >

        <button type="submit" class="btn btn-primary">Confirm edit</button>

    </form>
</div>
@endsection

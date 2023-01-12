@extends('layouts.main')

@section('content')
<h3 class="text-center py-3">Create New Comic</h3>

<div class="container d-flex justify-content-center">
    <form class="d-flex flex-column w-25" action="{{route('comics.store')}}" method="POST">
        @csrf

        <label for="title">Add Title</label>
        <input class="mb-3" type="text" name="title" id="title">

        <label for="description">Add Description</label>
        <input class="mb-3" type="text" name="description" id="description">

        <label for="thumb">Add Thumb</label>
        <input class="mb-3" type="text" name="thumb" id="thumb">


        <label for="price">Add Price</label>
        <input class="mb-3" type="number" name="price" id="price">

        <label for="series">Add Series</label>
        <input class="mb-3" type="text" name="series" id="series">

        <label for="sale_date">Add Sale Date</label>
        <input class="mb-3" type="date" name="sale_date" id="sale_date">

        <label for="type">Add Type</label>
        <input class="mb-3" type="text" name="type" id="type">

        <button type="submit" class="btn btn-primary">Add Comic to DB</button>

    </form>
</div>
@endsection

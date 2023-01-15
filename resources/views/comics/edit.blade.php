@extends('layouts.main')

@section('content')
<h3 class="text-center py-3">Edit Comic: {{$comic->title}}
</h3>
<div class="text-center">
    <p>Delete {{$comic->title}}</p>
    @include('partials.delete', $comic)
</div>


<div class="container d-flex justify-content-center">

    <form class="d-flex flex-column w-25" action="{{route('comics.update', $comic)}}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Add Title *</label>
        <input
        class="mb-3 form-control
        @error('title')
        is-invalid
        @enderror
        " type="text" name="title" id="title"
        value="{{old('title', $comic->title)}}">

        @error('title')
        <div class=" mb-3 invalid-feedback">
            {{$message}}
        </div>
        @enderror



        <label for="description">Add Description</label>
        <textarea
        class="mb-3 form-control" name="description" id="description">{{old('description',$comic->description)}}</textarea>



        <label for="thumb">Add Thumb</label>
        <input class="mb-3 form-control" type="text" name="thumb" id="thumb" value="{{old('thumb', $comic->thumb)}}">


        <label for="price">Add Price *</label>
        <input
        class="mb-3 form-control
        @error('price')
            is-invalid
        @enderror"
         type="number"
        step=0.01
        name="price" id="price"
        value="{{old('price',$comic->price)}}"
        >

        @error('price')
        <div class=" mb-3 invalid-feedback">
          {{$message}}
        </div>
        @enderror

        <label for="series">Add Series *</label>
        <input
        class="mb-3 form-control
        @error('series')
            is-invalid
        @enderror"
         type="text" name="series" id="series" value="{{old('series', $comic->series)}}">

         @error('series')
         <div class=" mb-3 invalid-feedback">
           {{$message}}
         </div>
         @enderror

        <label for="sale_date">Add Sale Date *</label>
        <input
        class="mb-3 form-control
        @error('sale_date')
         is-invalid
        @enderror"
         type="date" name="sale_date" id="sale_date" value="{{old('sale_date', $comic->sale_date)}}">

         @error('sale_date')
         <div class=" mb-3 invalid-feedback">
           {{$message}}
         </div>
         @enderror

        <label for="type">Add Type *</label>
        <input
        class="mb-3 form-control
        @error('type')
            is-invalid
        @enderror"
         type="text" name="type" id="type" value="{{old('type'), $comic->type}}">

         @error('type')
         <div class=" mb-3 invalid-feedback">
            {{$message}}
          </div>
         @enderror

        <button type="submit" class="btn btn-primary my-3">Confirm edit</button>

    </form>
</div>
@endsection

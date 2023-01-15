@extends('layouts.main')

@section('content')

<div class="container flex-column d-flex align-items-center justify-content-center">
    <h4 class="text-center text-danger py-4">
        Error 404 !!!
    </h4>

    <a class="btn btn-primary" href="{{route('comics.index')}}">Back to home <i class="fa-solid fa-house"></i> </a>

</div>

@endsection


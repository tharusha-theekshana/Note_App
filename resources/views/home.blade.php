@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-8 offset-lg-2 col-10 offset-1">
        <h4 class="my-5 fw-bold"> Add Your Note </h4>
        <form action="/addNote" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control shadow-none @error('title') is-invalid @enderror" value="{{ old('title') }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="title">

                @error('title')
                <small id="emailHelp" class="form-text text-danger"> {{ $message }}</small>
                @enderror

            </div>
            <div class="form-group my-2">
                <label for="exampleInputPassword1">Description </label>
                <textarea class="form-control shadow-none @error('description') is-invalid @enderror" value="{{ old('description') }}" id="exampleFormControlTextarea1" rows="4" name="description"></textarea>

                @error('description')
                <small id="emailHelp" class="form-text text-danger"> {{ $message }}</small>
                @enderror

            </div>
            <div class="my-4 col-12 text-center">
                <button type="submit" class="btn btn-warning text-black fw-bold">Save Note</button>
                <button type="submit" class="btn btn-warning text-black fw-bold m-auto pe-auto">Clear</button>
            </div>
        </form>
    </div>
</div>
@endsection



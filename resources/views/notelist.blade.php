@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="col-12 text-center"><p class="fs-2 fw-bold mt-5 mb-5">All Notes </p></div>
            <hr>
            <div class="col-10 offset-1">
                @foreach($notes as $note)
                    <div class="border border-secondary rounded px-4 pt-4 pb-2 my-2">
                        <p class="fw-bold fs-4"> {{ $note -> title }} </p>
                        <div>
                            <p class="text-secondary-emphasis"> {{$note -> description }}</p>
                            <div>
                                <a href="/delete/{{ $note-> id }}" class="text-decoration-none"><button class="btn btn-danger btn-sm" style="font-size: 14px"> Delete &nbsp;<i class="bi bi-trash-fill"></i> </button></a>
                                <a href="/update/{{ $note-> id }}" class="text-decoration-none"><button class="btn btn-secondary btn-sm" style="font-size: 14px"> Edit &nbsp;<i class="bi bi-pencil-square"></i></button></a>
                            </div>
                            <div class="mt-2 col-12">
                                <p class="d-flex flex-row justify-content-end" style="font-size: 12px">  Created At : <span class="fw-bold"> {{ $note -> created_at  }} </span> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



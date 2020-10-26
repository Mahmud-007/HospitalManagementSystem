@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
    <div class="title m-b-md">
        Bed List
    </div>
    @foreach($beds as $bed)
        <div>{{$bed->name}}--{{$bed->status}}</div>
        <form action='/beds/{{$bed->id}}' method="POST">
            @csrf
            @method('DELETE')
            <button>Remove Bed</button>
            <br> <br>
            </form>

    @endforeach
                <div class="links">
                    <a href="/createBed">Create Bed</a>
                    <a href="/admit">Admit Patient</a>
                    <a href="/patients">Patient List</a>
                </div>
            <h3>{{session('msg')}}</h3>
        </div>
    </div>
@endsection

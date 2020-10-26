@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Patient's List
            </div>
            @for($i=0;$i<count($patients);$i++)
            <div>{{$patients[$i]->name}}---{{$patients[$i]->age}}---{{$patients[$i]->mobile_no}}---{{$bedName[$i]}}</div>
            <form action='/patients/{{$patients[$i]->id}}' method="POST">
            @csrf
            @method('DELETE')
            <button>Release</button>
            <br> <br>
            </form>
            @endfor
                <div class="links">
                    <a href="/createBed">Create Bed</a>
                    <a href="/beds">Bed List</a>
                    <a href="/admit">Admit Patient</a>
                </div>
            <br> <br>
            <h3>{{session('msg')}}</h3>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <br/><br/><br/>
    <div class=" container title  flex-center">
        Bed List
    </div>
    <table class=" container table table-striped" id="myTable">
        <thead>
        <tr>

            <th scope="col">Bed No</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($beds as $bed)

            <tr>
                <th scope="row ">{{$bed->name}}</th>
                <td >
                    {{$bed->status}}
                </td>
                <td class="action">
                    <form action='/beds/{{$bed->id}}' method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Remove Bed</button>
                        <br> <br>
                    </form>
                </td>

            </tr>
        @endforeach

            <div class="container">
                <h3>{{session('msg')}}</h3>
            </div>

        </tbody>

    </table>

@endsection



@extends('layouts.app')

@section('content')
    <br/><br/><br/>
    <div class=" container title  flex-center">
        Patient's List
    </div>
    <table class=" container table table-striped" id="myTable">
        <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Mobile No</th>
            <th scope="col">Bed No</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($patients);$i++)
            <tr>
                <th scope="row">{{$patients[$i]->name}}</th>
                <td> {{$patients[$i]->age}} </td>
                <td>{{$patients[$i]->mobile_no}}</td>
                <td>{{$bedName[$i]}}</td>
                <td class="action">
                    <form action='/patients/{{$patients[$i]->id}}' method="POST">
                        @csrf
                        @method('POST')
                        <button>Release</button>

                    </form>
                    <form action='/patient/bill/{{$patients[$i]->id}}' method="POST">
                        @csrf
                        @method('GET')
                        <button>Bill</button>
                    </form>

                    <form action='/patient/payment/{{$patients[$i]->id}}' method="POST">
                        @csrf
                        @method('GET')
                        <button>Payment</button>
                    </form>
                </td>

        @endfor


        <div class="container">
            <h3>{{session('msg')}}</h3>
        </div>

        </tbody>

    </table>


@endsection

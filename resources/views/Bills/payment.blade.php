@extends('layouts.app')

@section('content')
    <br/><br/><br/>

    <table class=" container table table-striped" >
        <h1 class="container-sm">Patient's Information:</h1>
        <thead>

        <tr>
            <th scope="col">Patient Name</th>
            <th scope="col">Bed No</th>
            <th scope="col">Mobile No</th>
            <th scope="col">Age</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row ">{{$patient->name}}</th>
                <td >
                    {{$patient->bed_id}}
                </td>
                <td >
                    {{$patient->mobile_no}}
                </td>
                <td>
                    {{$patient->age}}
                </td>
            </tr>
        <tr>
            <td>
                <div class="container">
                    <h1>Total Due: {{$due}} Tk.</h1>
                </div>
            </td>
        </tr>
        </tbody>

    </table>

    <table class=" container table table-striped" >
        <h1 class="container-sm">Due Payment List</h1>
        <thead>

        <tr>
            <th scope="col">Medicine/Test</th>
            <th scope="col">Charge</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>
            @foreach($due_bill as $dues)
                <tr>
                    <th scope="row ">{{$dues->bill_name}}</th>
                    <td >
                        {{$dues->charge}}
                    </td>
                    <td>
                        <form action="/patient/payment/{{$dues->id}}" method="POST">
                            @csrf
                            <input type="submit" value="Pay">
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>

@endsection

@extends('layouts.app')

@section('content')
    <br/><br/><br/>
    <div class=" container title  flex-center">
        Bills of {{$patient}}
    </div>
    <div class="container">
        <form action="/patient/bill/{{$id}}" method="POST">
            @csrf
            <label for="bill_name">Medicine/Test:</label>
            <input type="text" name="bill_name"  required>
            <label for="charge">Charge:</label>
            <input type="number" name="charge"  required>
            <label for="bill_state">Status</label>
            <select name="bill_state">
                <option value="Due">Due</option>
                <option value="Paid">Paid</option>
            </select>
            <input type="submit" value="Add">
        </form>
    </div>
    <table class=" container table table-striped" >
        <thead>
        <tr>

            <th scope="col">Test/Medicine</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>


        </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)

            <tr>
                <th scope="row ">{{$bill->bill_name}}</th>
                <td >
                    {{$bill->charge}}
                </td>
                <td >
                    {{$bill->bill_state}}
                </td>

            </tr>
        @endforeach


                <div class="container">
                    <h3>{{session('msg')}}</h3>
                </div>

        </tbody>

    </table>


@endsection

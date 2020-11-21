@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Admit Patient
            </div>

    <form action="/admit" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{session('name')}}" required>

    <label for="age">Age:</label>
    <input type="number" name="age" value="{{session('age')}}">

    <label for="mobile_no">Mobile No:</label>
    <input type="text" name="mobile_no" value="{{session('mobile')}}">

    <label for="bed">Bed:</label>
        <!--  <input type="text" name="bed">
         here will be a drop down from the bed array which can be found from the varriable passing from BedController-->
        <select name="bed">
            @foreach($availablebed as $bed)
                <option> {{$bed->name}}</option>
            @endforeach
        </select>
    <button type="submit">Admit Patient</button>
  </form>
            <br> <br>
    <h3>{{session('msg')}}</h3>

        </div>
    </div>
@endsection

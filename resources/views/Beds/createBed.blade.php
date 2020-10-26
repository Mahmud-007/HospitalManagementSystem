@extends('layouts.app')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Create a new bed
            </div>
  <form action="/createBed" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <label for="status">Status</label>
    <select name="status" id="status">
      <option value="available">Available</option>
      <option value="unavailable">Unavailable</option>

    </select>


    <input type="submit" value="Add">
  </form>
            <br> <br>
            <h3>{{session('msg')}}</h3>
            <div class="links">
                <a href="/beds">Bed List</a>
                <a href="/admit">Admit Patient</a>
                <a href="/patients">Patient List</a>
            </div>
        </div>
    </div>
@endsection

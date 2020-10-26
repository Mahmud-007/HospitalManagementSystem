@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Hosptal Management System
                </div>

                <div class="links">
                    <a href="/createBed">Create Bed</a>
                    <a href="/beds">Bed List</a>
                    <a href="/admit">Admit Patient</a>
                    <a href="/patients">Patient List</a>
                </div>

            </div>
        </div>
@endsection

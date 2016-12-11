@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div>
                    <strong><h1 id="time" style="font-size: 50px;"> hrs</h1></strong>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-5">
                <div><h5> {{$today}}</h5></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-5">
                @if($logged_in == "false")
                    <div id="timeIn">
                        <button id="checkIn" type="button" class="btn btn-success">Time In</button>
                    </div>
                @else
                    <div id="timeOut">
                        <button id="CheckOut" type="button" class="btn btn-danger">Time Out</button>
                    </div>
                @endif

                <div id="timeOut" style="display: none; ">
                    <button id="CheckOut" type="button" class="btn btn-danger">Time Out</button>
                </div>

            </div>
        </div>
    </div>
    <script>

    </script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Users</h4>
                <ul class="nav nav-pills nav-stacked">
                    <?php $x=0; ?>
                    @foreach($attendanceLogs as $item)
                        <li class="{{$item['tab_class']}}"><a href="#tab_{{$x}}" data-toggle="tab">{{$item['name']}}
                                <br/>{{$item['email']}}
                            </a>
                        </li>
                        <?php $x++; ?>
                    @endforeach
                </ul>


            </div>

            <div class="col-md-8">
                <div class="tab-content">
                    @for($x=0; $x<count($attendanceLogs); $x++)
                        <div class="tab-pane {{$attendanceLogs[$x]['tab_class']}}" id="tab_{{$x}}">
                            <h4>{{$attendanceLogs[$x]['name']}}'s Logs</h4>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($y=0; $y<count($attendanceLogs[$x]['attendance']); $y++)
                                    <tr>
                                        <td>{{date('D, d/M/y',strtotime($attendanceLogs[$x]['attendance'][$y]['created_at']))}}</td>
                                        <td>{{date('H:i',strtotime($attendanceLogs[$x]['attendance'][$y]['created_at']))}} Hrs</td>
                                        <td>{{date('H:i',strtotime($attendanceLogs[$x]['attendance'][$y]['updated_at']))}} Hrs</td>
                                    </tr>
                                @endfor

                                </tbody>
                            </table>
                        </div>
                    @endfor
                </div><!-- tab content -->

            </div>
        </div>
    </div>
@endsection

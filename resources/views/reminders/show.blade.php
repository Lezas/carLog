@extends('layouts.index')

@section('content')
    <div class="col-lg-9 col-sm-12">
        @include('shared.errors')
        @include('shared.messages')
        <h2>{{$reminder->name}}
            <a href="{{ route('edit_reminder', ['car' => $car,'reminder' => $reminder]) }}"
               class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"
                                                    aria-hidden="true"></span></a>
            @if($car->mileage > $reminder->next_service_mileage)
                <span style="background-color: #F2F2aa">You need to '{{$reminder->name}}'!</span>
            @endif
        </h2>
        Remind me every:
        {{$reminder->date_interval}} days, {{$reminder->mileage_interval}} miles
        <h4>Next due</h4>
        <hr style="margin: 0">
        <p>{{$reminder->next_service_date}} {{$reminder->next_service_mileage}} miles</p>
        <h4>Today</h4>
        <hr style="margin: 0">
        <p>{{Carbon\Carbon::today()->format('Y-m-d')}} {{$car->mileage}} miles</p>
        @if($last_service)
            <h4>Last service:</h4>
            <hr style="margin: 0">
            {{$last_service->date}} {{$last_service->mileage}} miles <br><br>
        @endif
        <a href="{{route('reminder_add_record',['car' => $car, 'reminder' => $reminder])}}" class="btn btn-success">
            ADD RECORD
        </a>
    </div>
    <div class="col-lg-3 col-sm-12 text-center">
        @include('cars.widgets.car_info')
    </div>

@endsection

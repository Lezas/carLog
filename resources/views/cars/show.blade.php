@extends('layouts.index')

@section('content')
    <div class="col-lg-9 col-sm-12">
        @include('shared.messages')
        <h3>Reminders:</h3>
        @if (count($reminders) > 0)
            @foreach ($reminders as $reminder)
                <div class="row"
                     style="background-color:
                     @if($car->mileage > $reminder->next_service_mileage)
                             #F2F2aa;

                     @else
                             #F2F2F2;
                     @endif
                             margin: 0 5px 15px 0; border: 1px solid #e7e7e7; box-shadow: 1px 1px 1px #888888; border-radius: 5px">

                    <div class="col-sm-9 col-xs-12">
                        <h2>
                            <a href="{{route('show_reminder',['car' => $car, 'reminder' => $reminder])}}">
                                {{$reminder->name}}
                            </a>
                        </h2>
                        <p>Next service: {{$reminder->next_service_date}} {{$reminder->next_service_mileage}}</p>
                        @if($car->mileage > $reminder->next_service_mileage)
                            <h3>You need to '{{$reminder->name}}'</h3>
                        @else
                            <h3>{{$reminder->next_service_mileage - $car->mileage}} miles left</h3>
                        @endif

                    </div>
                </div>
            @endforeach
        @endif

        <a href="{{route('add_reminder_form',['car'=>$car])}}" class="btn btn-success btn-lg">Add reminder</a>



    </div>
    <div class="col-lg-3 col-sm-12 text-center">
        @include('cars.widgets.car_info')
    </div>
@endsection

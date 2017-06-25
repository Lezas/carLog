@extends('layouts.index')

@section('content')
    @include('shared.messages')
    <div class="col-lg-10 col-sm-12">
        @if (count($cars) > 0)
            @foreach ($cars as $car)
                <div class="row"
                     style="background-color: #F2F2F2; margin: 0 5px 15px 0; border: 1px solid #e7e7e7; box-shadow: 1px 1px 1px #888888; border-radius: 5px">
                    <div class="col-sm-3 col-xs-12" style="margin-left:0; padding-left: 0">
                        <img class="img-responsive" src="
                            @if($car->photo)
                                {{url('/images/cars/'.$car->photo)}}
                            @else
                                {{url('/images/cars/car_default.png')}}
                            @endif
                        " alt="">
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <h2>
                            <a href="{{url('/car/'.$car->id)}}">
                                @if ($car->name)
                                    {{$car->name}}
                                @else
                                    {{$car->brand}} {{$car->model}}
                                @endif
                            </a>
                        </h2>

                        <h3>Mileage: {{$car->mileage}}</h3>
                        <p>Time to next service: 2 weeks</p>

                    </div>
                </div>
            @endforeach
        @endif

    </div>
    <div class="col-lg-2 col-sm-12 text-center"
         style="background-color: #3097D1; min-height: 130px; box-shadow: 1px 1px 2px #2a88bd; border: 1px solid #2a88bd; border-radius: 15px">
        <br>
        <a href="{{ url('car/add') }}" style="color: #fbfbfb;"><span class="glyphicon glyphicon-plus"
                                                                     style="font-size: 55px"
                                                                     aria-hidden="true"></span>
            <br><span
                    style="font-size: 25px;">Add Car
            </span>
        </a>
    </div>
@endsection

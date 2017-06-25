@extends('layouts.index')

@section('content')

    <div class="col-lg-9 col-sm-12">
        @include('shared.messages')
        <h2>Are you sure you want to delete this car?</h2>
        <div class="row">
            @include('shared.errors')

            <div class="col-sm-6">
                {!! Form::model($car ,array('route' => ['delete_car','car' => $car],'method'=>'POST', 'class' => 'form-horizontal')) !!}

                <button class="btn btn-danger btn-block">Yes</button>
                {!! Form::close() !!}
            </div>
            <div class="col-sm-6">
                <a href="{{route('show_car',['car' => $car])}}" class="btn btn-success btn-block">No</a>
            </div>

        </div>
    </div>
        <div class="col-lg-3 col-sm-12 text-center">
            @include('cars.widgets.car_info')
        </div>
@endsection

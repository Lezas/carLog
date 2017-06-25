@extends('layouts.index')

@section('content')
    <div class="col-lg-9 col-sm-12">
        @include('shared.messages')
        @include('shared.errors')
        New reminder
        {!! Form::open(array('route' => array('add_reminder', $car),'method'=>'POST', 'class' => 'form-horizontal')) !!}
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Reminder name*:</label>
                <div class="col-sm-9">
                    {!! Form::text('name', null, array('placeholder' => 'Reminder name','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Time interval in days*:</label>
                <div class="col-sm-9">
                    {!! Form::number('date_interval', null, array('placeholder' => 'Time interval in days','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Mileage interval*:</label>
                <div class="col-sm-9">
                    {!! Form::number('mileage_interval', null, array('placeholder' => 'Mileage interval','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-sm-11">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-lg-3 col-sm-12 text-center">
        @include('cars.widgets.car_info')
    </div>

@endsection

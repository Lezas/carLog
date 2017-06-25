@extends('layouts.index')

@section('content')
    <div class="col-lg-9 col-sm-12">
        @include('shared.messages')
        @include('shared.errors')
        {!! Form::model($car ,array('route' => ['update_car','car' => $car],'method'=>'POST', 'class' => 'form-horizontal', 'files' => true)) !!}

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Car name:</label>
            <div class="col-sm-10">
                {!! Form::text('name', null, array('placeholder' => 'Car name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="brand">Brand*:</label>
            <div class="col-sm-10">
                {!! Form::text('brand', null, array('placeholder' => 'Brand','class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="model">Model*:</label>
            <div class="col-sm-10">
                {!! Form::text('model', null, array('placeholder' => 'Model','class' => 'form-control', 'required')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="birth_day">Year*:</label>
            <div class="col-sm-10">
                {!! Form::date('birth_day', null, array('placeholder' => 'Date','class' => 'form-control', 'required' => '')) !!}
            </div>
        </div>
        <div class="form-group">
            <label required="" class="control-label col-sm-2" for="mileage">Mileage*:</label>
            <div class="col-sm-10">
                {!! Form::number('mileage', null, array('placeholder' => 'Mileage','class' => 'form-control', 'required' => '')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="power">Power in HP:</label>
            <div class="col-sm-10">
                {!! Form::number('power', null, array('placeholder' => 'Power in HP','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="drive_train">Drive train:</label>

            <div class="col-sm-10">
                {!! Form::select('drive_train', ['FWD','RWD','AWD'],null, array('placeholder' => 'Power in HP','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="photo">Car image:</label>
            <div class="col-sm-10">
                {!! Form::file('image', null, array('class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10">
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-default btn-block">Save</button>
            </div>
        </div>
        </form>
    </div>

    <div class="col-lg-3 col-sm-12 text-center">
        @include('cars.widgets.car_info')
    </div>
@endsection

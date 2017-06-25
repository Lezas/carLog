@extends('layouts.index')

@section('content')
    <div class="col-lg-9 col-sm-12">
        @include('shared.errors')
        @include('shared.messages')
        {!! Form::model($record,array('route' => ['update_record','record' => $record],'method'=>'POST', 'class' => 'form-horizontal')) !!}
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Record name*:</label>
                <div class="col-sm-9">
                    {!! Form::text('name', null, array('placeholder' => 'Record name','class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label class="control-label col-sm-4" for="date">Service date*:</label>
                <div class="col-sm-8">
                    {!! Form::date('date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}

                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label col-sm-4" for="mileage">Mileage*:</label>
                <div class="col-sm-8">
                    {!! Form::number('mileage', null, array('placeholder' => 'Mileage','class' => 'form-control')) !!}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label class="control-label col-sm-4" for="labor_cost">Labor Cost:</label>
                <div class="col-sm-8">
                    {!! Form::number('labor_cost', null, array('placeholder' => 'Labor Cost','class' => 'form-control', 'step' => '0.01')) !!}

                </div>
            </div>
            <div class="form-group col-sm-6">
                <label class="control-label col-sm-4" for="parts_cost">Parts Cost:</label>
                <div class="col-sm-8">
                    {!! Form::number('parts_cost', null, array('placeholder' => 'Parts Cost','class' => 'form-control', 'step' => '0.01')) !!}

                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-9">
                    {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-default btn-block">Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-lg-3 col-sm-12 text-center">

    </div>

@endsection

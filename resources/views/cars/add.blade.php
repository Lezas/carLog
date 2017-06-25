@extends('layouts.index')

@section('content')
    <div class="col-lg-8 col-sm-12 col-lg-offset-2">
        @include('shared.messages')
        @include('shared.errors')
        <form action="{{ url('car/') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Car name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Car name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="brand">Brand*:</label>
                <div class="col-sm-10">
                    <input required="" type="text" class="form-control" id="brand" name="brand" placeholder="Brand">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="model">Model*:</label>
                <div class="col-sm-10">
                    <input required="" type="text" class="form-control" id="model" name="model" placeholder="Model">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="birth_day">Year*:</label>
                <div class="col-sm-10">
                    <input required="" type="date" class="form-control" id="birth_day" placeholder="Date" name="birth_day">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="power">Power in HP:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="power" name="power" placeholder="Power in HP">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="drive_train">Drive train:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="drive_train" name="drive_train">
                        <option>FWD</option>
                        <option>RWD</option>
                        <option>AWD</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label required="" class="control-label col-sm-2" for="mileage">Mileage*:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="mileage" name="mileage" placeholder="Mileage">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" placeholder="Description" name="description"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-default btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.index')

@section('content')
    <div class="col-lg-9 col-sm-12">
        @include('shared.errors')
        @include('shared.messages')
        <form action="{{ url('car/'.$car->id . '/record') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Record name*:</label>
                    <div class="col-sm-9">
                        <input required="" type="text" class="form-control" id="name" name="name"
                               placeholder="Record name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="date">Service date*:</label>
                    <div class="col-sm-8">
                        <input required="" type="date" class="form-control" id="date" placeholder="Date" name="date">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="mileage">Mileage*:</label>
                    <div class="col-sm-8">
                        <input required="" type="number" class="form-control" id="mileage" name="mileage"
                               placeholder="Mileage">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="labor_cost">Labor Cost:</label>
                    <div class="col-sm-8">
                        <input type="number" step="0.01" class="form-control" id="labor_cost" name="labor_cost"
                               placeholder="Labor Cost" value="0">
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label col-sm-4" for="parts_cost">Parts Cost:</label>
                    <div class="col-sm-8">
                        <input type="number" step="0.01" class="form-control" id="parts_cost" name="parts_cost"
                               placeholder="Parts Cost" value="0">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-9">
                    <textarea class="form-control" id="description" placeholder="Description"
                              name="description"></textarea>
                    </div>
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
    <script>
        Date.prototype.toDateInputValue = (function () {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        document.getElementById('date').value = new Date().toDateInputValue();
    </script>
@endsection

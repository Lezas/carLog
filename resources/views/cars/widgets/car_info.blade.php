<img class="img-responsive" src="
@if($car->photo)
{{url('/images/cars/'.$car->photo)}}
@else
{{url('/images/cars/car_default.png')}}
@endif
" alt="">
<h3>
    @if ($car->name)
        {{$car->name}}
    @else
        {{$car->brand}} {{$car->model}}
    @endif
    <a href="{{ route('edit_car', ['car' => $car]) }}"
       class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"
                                            aria-hidden="true"></span></a>
</h3>
<h4>Mileage: {{$car->mileage}}
    <a href="{{ route('edit_car', ['car' => $car]) }}" class="btn btn-default btn-xs">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </a>
</h4>

<div class="list-group">
    <a href="{{ route('show_car', ['car' => $car]) }}" class="list-group-item
    @if(ends_with(Route::currentRouteAction(), 'CarController@show'))
            active
    @endif
            ">Reminders</a>
    <a href="{{ route('show_records', ['car' => $car]) }}" class="list-group-item
    @if(ends_with(Route::currentRouteAction(), 'RecordController@index'))
            active
    @endif
            ">Service history</a>

</div>

<div class="list-group ">
    <a href="{{ route('delete_car_form', ['car' => $car]) }}" class="list-group-item list-group-item-danger
    @if(ends_with(Route::currentRouteAction(), 'CarController@delete_form'))
            active
    @endif
">Delete</a>

</div>
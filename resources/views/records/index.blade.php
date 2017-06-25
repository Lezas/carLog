@extends('layouts.index')

@section('content')
    @include('shared.messages')
    <div class="col-lg-9 col-sm-12">
        <a href="{{ route('add_record', ['car' => $car]) }}" class="btn btn-success">Add record</a>
        <table class="table">
            <thead>
            <th>Date</th>
            <th>Mileage</th>
            <th>Name</th>
            <th>Labor Cost</th>
            <th>Parts Cost</th>
            <th>Description</th>
            <th>&nbsp;</th>

            </thead>
            <tbody>
            @if (count($records) > 0)
                @foreach ($records as $record)
                    <tr>
                        <td class="col-md-2">{{ $record->date }}</td>
                        <td class="col-md-1">{{ $record->mileage }}</td>

                        <td class="col-md-2">{{ $record->name }}</td>
                        <td class="col-md-1">{{ $record->labor_cost }}</td>
                        <td class="col-md-1">{{ $record->parts_cost }}</td>
                        <td class="col-md-4">{{ $record->description }}</td>
                        <td class="col-md-1">
                            <a href="{{ route('edit_record', ['record' => $record, 'car' => $car]) }}"
                               class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"
                                                                    aria-hidden="true"></span></a>
                            {!! Form::open(['method' => 'DELETE','route' => ['delete_record', 'record' => $record],'style' => 'display:inline;']) !!}
                            <button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"
                                                                        aria-hidden="true"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


    </div>
    <div class="col-lg-3 col-sm-12 text-center">
        @include('cars.widgets.car_info')
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Car;
use App\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function showForm(Car $car,Request $request)
    {
        return view('records.add',[
            'car' => $car
        ]);
    }

    public function store(Car $car, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'mileage' => 'required',
        ]);

        $car->records()->create([
            'name' => $request->name,
            'date' => $request->date,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'labor_cost' => $request->labor_cost,
            'parts_cost' => $request->parts_cost,
        ]);

        return redirect(route('show_car', ['car' => $car]));
    }

    public function index(Car $car, Request $request)
    {
        $records = $car->records()->get()->where('deleted','false');
        return view('records.index',[
            'records' => $records,
            'car' => $car
        ]);
    }

    public function edit(Car $car, Record $record, Request $request)
    {
        $car = $record->car();
        return view('records.edit',[
            'record' => $record,
            'car' => $car
        ]);
    }

    public function update(Record $record, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'mileage' => 'required',
        ]);

        $record->update($request->all());
        return redirect(route('show_records', ['car' => $record->car, 'record' => $record]))
            ->with('success','Record updated successfully');
    }

    public function delete(Record $record, Request $request)
    {
        $record->deleted = true;
        $record->save();
        return redirect(route('show_records', ['car' => $record->car]))
            ->with('success','Record deleted successfully');
    }

}

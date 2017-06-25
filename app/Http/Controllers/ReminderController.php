<?php

namespace App\Http\Controllers;

use App\Car;
use App\Record;
use App\Reminder;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ReminderController extends Controller
{
    public function showForm(Car $car, Request $request)
    {
        return view('reminders.add', [
            'car' => $car
        ]);
    }

    public function store(Car $car, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date_interval' => 'required',
            'mileage_interval' => 'required',
        ]);

        $reminder = $car->reminders()->create($request->all());

        return redirect(route('add_reminder_step_two', ['car' => $car, 'reminder' => $reminder]));
    }

    public function stepTwo(Car $car, Reminder $reminder, Request $request)
    {
        return view('reminders.add_step_two', ['car' => $car, 'reminder' => $reminder]);
    }

    public function stepThree(Car $car, Reminder $reminder, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'mileage' => 'required',
        ]);

        //TODO: need to check if typed mileage is not higher than current car mileage

        $record = $car->records()->create([
            'name' => $request->name,
            'date' => $request->date,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'labor_cost' => $request->labor_cost,
            'parts_cost' => $request->parts_cost,
        ]);

        $next_mileage = $record->mileage + $reminder->mileage_interval;
        $next_date = date('y-m-d', strtotime($record->date . '+' . $reminder->date_interval . ' days'));

        $reminder->next_service_date = $next_date;
        $reminder->next_service_mileage = $next_mileage;
        $reminder->last_service_id = $record->id;
        $reminder->save();

        return redirect(route('show_car', ['car' => $car]));

    }

    public function stepFour(Car $car, Reminder $reminder, Request $request)
    {
        $this->validate($request, [
            'next_service_date' => 'required',
            'next_service_mileage' => 'required',
        ]);

        $reminder->next_service_date = $request->next_service_date;
        $reminder->next_service_mileage = $request->next_service_mileage;
        $reminder->save();

        return redirect(route('show_car', ['car' => $car]));
    }

    public function show(Car $car, Reminder $reminder, Request $request)
    {
        $last_service = Record::find($reminder->last_service_id);
        if (null == $reminder->next_service_date || null == $reminder->next_service_mileage)
        {
            return redirect(route('add_reminder_step_two',['car' => $car, 'reminder' => $reminder]));
        }
        return view('reminders.show', [
            'car' => $car,
            'reminder' => $reminder,
            'last_service' => $last_service,
        ]);
    }

    public function edit(Car $car, Reminder $reminder, Request $request)
    {
        return view('reminders.edit', ['car' => $car, 'reminder' => $reminder]);
    }

    public function update(Reminder $reminder, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date_interval' => 'required',
            'mileage_interval' => 'required',
        ]);

        $record = Record::find($reminder->last_service_id);

        $next_mileage = $record->mileage + $reminder->mileage_interval;
        $next_date = date('y-m-d', strtotime($record->date . '+' . $reminder->date_interval . ' days'));

        $reminder->name = $request->name;
        $reminder->date_interval = $request->date_interval;
        $reminder->mileage_interval = $request->mileage_interval;
        $reminder->next_service_date = $next_date;
        $reminder->next_service_mileage = $next_mileage;
        $reminder->save();

        return redirect(route('show_reminder', ['car' => $reminder->car, 'reminder' => $reminder]))
            ->with('success', 'Reminder updated successfully');
    }

    public function addRecord(Car $car, Reminder $reminder, Request $request)
    {
        return view('reminders.add_record', ['car' => $car, 'reminder' => $reminder]);

    }

    public function saveRecord(Car $car, Reminder $reminder, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'mileage' => 'required',
        ]);

        $record = $car->records()->create([
            'name' => $request->name,
            'date' => $request->date,
            'mileage' => $request->mileage,
            'description' => $request->description,
            'labor_cost' => $request->labor_cost,
            'parts_cost' => $request->parts_cost,
            'service_id' => $reminder->id
        ]);

        $next_mileage = $record->mileage + $reminder->mileage_interval;
        $next_date = date('y-m-d', strtotime($record->date . '+' . $reminder->date_interval . ' days'));

        $reminder->next_service_date = $next_date;
        $reminder->next_service_mileage = $next_mileage;
        $reminder->save();

        return redirect(route('show_car', ['car' => $car]))
            ->with('success', 'Record for \''. $reminder->name .'\' successfully created');
    }
}

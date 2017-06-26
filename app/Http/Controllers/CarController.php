<?php
/**
 * Created by Lezas.
 * Date: 2017-06-19
 * Time: 22:16
 */

namespace App\Http\Controllers;


use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $cars = $user->cars()->get()->where('deleted', false);
        return view('cars.dash', [
            'cars' => $cars,
        ]);
    }

    public function showForm(Request $request)
    {
        return view('cars.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'birth_day' => 'required',
            'mileage' => 'required',
        ]);

        $request->user()->cars()->create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'birth_day' => $request->birth_day,
            'power' => $request->power,
            'drive_train' => $request->drive_train,
            'mileage' => $request->mileage,
            'description' => $request->description,
        ]);

        return redirect('/cars/')
            ->with('success', 'Car created successfully');
    }

    public function show(Car $car, Request $request)
    {
        $reminders = $car->reminders()->get();

        return view('cars.show', ['car' => $car, 'reminders' => $reminders]);

    }

    public function edit(Car $car, Request $request)
    {

        return view('cars.edit', [
            'car' => $car
        ]);
    }

    public function update(Car $car, Request $request)
    {

        $this->validate($request, [
            'brand' => 'required',
            'model' => 'required',
            'birth_day' => 'required',
            'mileage' => 'required',
        ]);
        $car->update($request->all());

        if ($request->hasFile('image')) {
            $imageName = md5($request->file('image')->getClientOriginalName().date('now')). '.' .
                $request->file('image')->getClientOriginalExtension();

            $request->file('image')->move(
                base_path() . '/public/images/cars/', $imageName
            );

            $car->photo = $imageName;
            $car->save();
        }
        return redirect(route('show_car', ['car' => $car]))
            ->with('success', 'Car updated successfully');
    }

    public function delete_form(Car $car, Request $request)
    {
        return view('cars.delete_confirmation', ['car' => $car]);
    }

    public function delete(Car $car, Request $request)
    {
        $car->deleted = true;
        $car->save();

        return redirect(route('cars'));
    }

}
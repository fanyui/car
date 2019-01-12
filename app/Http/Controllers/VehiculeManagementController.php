<?php

namespace App\Http\Controllers;
use App\Vehicule;
use App\Transaction;
use App\Worker;

use Illuminate\Http\Request;

class VehiculeManagementController extends Controller
{
    public function create(Request $request)
    {
    	return view('createVehicule');
    }
    public function save(Request $request)
    {
    	$this->validate($request, [
		    'mark' => 'required|string|max:255',
		    'owner' => 'required|string|max:255',
		    'plate_number' => 'required|string|min:9',
		]);

		$vehicule = new Vehicule();
		$vehicule->mark = $request->mark;
		$vehicule->owner = $request->owner;
		$vehicule->plate_number = $request->plate_number;

		$vehicule->save();

    	return back()->with("message","Vehicule Successfully Added. ");

    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
		    'mark' => 'required|string|max:255',
		    'owner' => 'required|string|max:255',
		    'plate_number' => 'required|string|min:9',
		]);

		$vehicule = Vehicule::find($id);
		$vehicule->mark = $request->mark;
		$vehicule->owner = $request->owner;
		$vehicule->plate_number = $request->plate_number;

		$vehicule->save();

    	return "updated vehicule successfully ";
    }

    public function getAll(Request $request)
    {
    	$request = Vehicule::get();

    	return $request;
    }

    public function unassigned(Request $request)
    {
    	$assignedCar = Transaction::pluck('vehicule_id')->all();

    	$unassignedCars  = Vehicule::whereNotIn('id', $assignedCar)->get();

    	return $unassignedCars;

    }

//get the cars that have been completed  already
    public function completedCars(Request $request)
    {
    		$completedCars = Transaction::where('status', 'completed')->vehicule();

    		return $completedCars;
    }

    public function fixingCars(Request $request)
    {
    	$fixingCars = Transaction::where('status', 'fixing')->vehicule();

    	return $fixingCars;
    }
}





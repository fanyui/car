<?php

namespace App\Http\Controllers;
use App\Worker;
use App\Transaction;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function create(Request $request)
    {
    	return view('workerForm');
    }

    public function save(Request $request)
    {
    	$this->validate($request, [
		    'name' => 'required|string|max:255',
		    'phone_number' => 'required|string|max:255',
		]);
    	$worker = new Worker();
    	$worker->name= $request->name;
    	$worker->phone_number = $request->phone_number;

    	$worker->save();

    	return back()->with("message","New Worker Successfully Added. ");
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
		    'name' => 'required|string|max:255',
		    'phone_number' => 'required|string|max:255',
		]);
    	$worker = Worker::find($id);
    	$worker->name= $request->name;
    	$worker->phone_number = $request->phone_number;

    	$worker->save();

    	return "success updating ";
    }

    public function getAll(Request $request)
    {
    	$workers = Worker::get();

    	return $workers;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Vehicule;
use App\Worker;

class TransactionController extends Controller
{
	public function create(Request $request)
	{
		return "Transaction cration form";
	}
    public function save(Request $request)
    {
        $this->validate($request, [
            'worker_id' => 'required|integer',
        ]);

    	$transaction = new Transaction();
    	$transaction->worker_id = $request->worker_id;
    	$transaction->vehicule_id = $request->vehicule_id;
    	$transaction->amount = $request->amount;
    	$transaction->released = 0;
    	$transaction->status= "intermediat";

    	$transaction->save();
        return back();
    }

    public function update(Request $request, $id)
    {
    	$transaction = Transaction::find($id);

    	$transaction->worker_id = $request->worker_id;
    	$transaction->vehicule_id = $request->vehicule_id;
    	$transaction->amount = $request->amount;
    	$transaction->released = $request->released;
    	$transaction->status= $request->status;

    	$transaction->save();

    }
    public function modalUpdate(Request $request)
    {
    	$this->validate($request, [
		    'released' => 'required',
		    'worker_id' => 'required',
		    'status' => 'required',
		    'trans_id' => 'required|integer',
            'amount' => 'required'
		]);

    	$transaction = Transaction::find($request->trans_id);

    	$transaction->worker_id = $request->worker_id;
    	$transaction->vehicule_id = $request->vehicule_id;
    	$transaction->amount = $request->amount;
    	$transaction->released = $request->released;
    	$transaction->status= $request->status;

    	$transaction->save();
        return back();

    }

    public function getAll(Request $request)
    {
    	$transaction = Transaction::get();

    	return  $transaction;
    }

//transactions done with car of particular id
    public function car(Request $request, $id)
    {
    	 $transactinsWithCar = Transaction::where('vehicule_id', $id)->get();

    	 return $transactinsWithCar;
    }

    //all transactions by a particular worker


    public function worker(Request $request, $id)
    {
    	$transactrionByWorker = Transaction::where('worker_id', $id);

    	return $transactrionByWorker;
    }


    public function dashboard(Request $request)
    {

    	//cars that have not been assigned (new)
    	$assignedCar = Transaction::pluck('vehicule_id')->all();

    	$unassignedCars  = Vehicule::whereNotIn('id', $assignedCar)->get();

    	//cars that are currently being fixed 
    	$fixingCars = Transaction::where('status', 'intermediat')->get();

    	//cars that have been completed and paid 
    	$completedCars = Transaction::where('status', 'completed')->get();

    	$workers = Worker::get();

    	$sum = Transaction::where('status', 'completed')->sum('amount');



    	return view('dashboard')
    		-> with('unassignedCars', $unassignedCars)
    		->with('fixingCars', $fixingCars)
    		->with('completedCars', $completedCars)
    		->with('workers', $workers)
    		->with('sum', $sum);
    }
    public function getTransaction(Request $request, $id)
    {
    	 $transaction = Transaction::find($id)->first();


    	 return View('details')->with('transaction', $transaction);
    }

}






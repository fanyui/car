<?php

namespace App;
use App\Vehicule;
use App\Worker;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'vehicule_id', 'worker_id', 'status', 'amount', 'released',
    ];


		public function vehicule(){
			return $this->belongsTo(\App\Vehicule::class);
		} 
		public function worker(){
			return $this->belongsTo(\App\Worker::class);
		} 
}

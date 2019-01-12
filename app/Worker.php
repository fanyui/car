<?php

namespace App;
use App\Transaction;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'name', 'phone_number',
    ];


	public function transaction(){
		return $this->hasMany(\App\Transaction::class,'worker_id');
	} 
}

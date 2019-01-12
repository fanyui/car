<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'plate_number', 'mark', 'owner',
    ];



		public function transaction(){
			return $this->hasMany(\App\Transaction::class,'vehicule_id');
		} 

}

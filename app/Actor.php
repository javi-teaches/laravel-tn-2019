<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
	public function getFullName()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	public function movies()
	{
		return $this->belongsToMany(Movie::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $table = 'tasks';

	protected $fillable = [
		'title',
		'description',
		'status'
	];

	public $rules = [
		'title' => 'required|string|max:128',
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}

<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;

use \Illuminate\Database\Eloquent\SoftDeletes;


class FinancialsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'financials';

	protected $fillable = [
							'id', 
							'value',
							'emission',
							'maturity',
							'payment',
							'entity_id', 
							'created_by', 
							'updated_by',
							'deleted_by'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at', 'emission', 'maturity', 'payment'];					

	public $timestamps = true;


	protected $casts = ['tags' => 'array'];


	public function entity()
    {
		return $this->belongsTo('App\Nay\Model\EntitiesModel', 'entity_id');
    }
}
<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class CategoriesModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'categories';


	protected $fillable = [
							'id', 
							'name', 
							'description', 
							'level',
							'category_id', 
							'created_by', 
							'updated_by',
							'deleted_by',
							'tags'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	protected $casts = ['tags' => 'array'];

    public function categoryParent()
    {
		return $this->belongsTo('App\Nay\Model\CategoriesModel', 'category_id');
    }



    public function categoryChilds()
    {
        return $this->hasMany('App\Nay\Model\CategoriesModel', 'category_id', 'id');
    }

}
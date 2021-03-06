<?php


namespace App\Nay\Model;

use App\Nay\Model\BaseModel;


class ProductsModel extends BaseModel
{

	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $table = 'products';

	protected $imagePath = 'images/products/';


	protected $fillable = [
							'id',
							'barcode',
							'external_code',
							'code', 
							'slug', 
							'name',
							'description', 
							'tags',
							'quantity_limit',
							'quantity',
							'sale_price',
							'purchase_price',
							'created_by',
							'updated_by',
							'deleted_by',
							'created_at',
							'updated_at',
							'deleted_at',
							'custom_field1',
							'custom_field2',
							'custom_field3',
							'custom_field4',
							'custom_field5',
							'custom_field6',
							'category_id',
							'brand_id'
						];

	protected $dates = ['created_at', 'updated_at', 'deleted_at'];					

	public $timestamps = true;

	protected $casts = ['tags' => 'array'];

    public function salesItens()
    {
        return $this->hasMany('App\Nay\Model\SalesItensModel', 'product_id', 'id');
    }

    public function brand()
    {
		return $this->belongsTo('App\Nay\Model\BrandsModel', 'brand_id');
    }

    public function category()
    {
		return $this->belongsTo('App\Nay\Model\CategoriesModel', 'category_id');
    }

    public function getImagesAttribute()
    {

		$images = $this->getImages();    	

		$imageUrl = [];

		foreach ($images as $i)
		{
			$imageUrl[] = url( $this->imagePath . basename($i));
		}

		return $imageUrl;
    }

}
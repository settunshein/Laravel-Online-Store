<?php

namespace App\Models;

use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\Traits\ButtonBuilder;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, UploadTrait, ButtonBuilder;

    protected $fillable = [ 'category_id', 'name', 'price', 'stock', 'slug', 'status', 'image', 'description' ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    public function getImagePath()
    {
        if( $this->image ){
            return asset('storage/product/'.$this->image);
        }else{
            return asset('image/img_default.png');
        }
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class. 'category_id', 'id');
    }

    /** 
     * To get product list
     * @return object product list object
     */
    public function getProductList()
    {
        return DataTables::of(Product::query())

        ->editColumn('image', function($product){
            return '
                <img src="'.$product->getImagePath().'" class="img-fluid" width="60px;"/>
            ';
        })

        ->editColumn('price', function($product){
            return number_format($product->price) . "<small> MMK</small>";
        })

        ->editColumn('stock', function($product){
            return number_format($product->stock);
        })

        ->addColumn('action', function($product){
            return $this->generateButton($product, 'product', ['show', 'edit', 'delete']);
        })

        ->rawColumns(['image', 'price', 'action'])
        ->make(true);
    }

    /** 
     * To save product data
     * @param array $validated validated values from product request
     * @return
     */
    public function saveProduct($validated)
    {
        $product = new Product();
        $product->category_id = $validated['category_id'];
        $product->name        = $validated['name'];
        $product->price       = $validated['price'];
        $product->stock       = $validated['stock'];
        $product->description = $validated['description'];
        $product->image       = $this->uploadFile($validated['image'], 'product');
        $product->save();
    }

    /** 
     * To update category data
     * @param array $validated validated values from product request
     * @param object $product product object
     * @return
     */
    public function updateProduct($validated, $product)
    {
        $product->category_id = $validated['category_id'];
        $product->name        = $validated['name'];
        $product->price       = $validated['price'];
        $product->stock       = $validated['stock'];
        $product->description = $validated['description'];
        $product->image       = $validated['image'] ? $this->uploadFile($validated['image'], 'product') : $product->image;
        $product->save();
    }

    /** 
     * To delete product data
     * @param object $product product object
     * @return
     */
    public function deleteProduct($product)
    {
        $product->delete();
    }

    /** 
     * To get category data
     * @return
     */
    public function getCreateOrEditProductData()
    {
        return Category::all();
    }
}

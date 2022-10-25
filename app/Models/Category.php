<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Traits\ButtonBuilder;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, ButtonBuilder;

    protected $fillable = ['name', 'slug'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getCreatedAtAttribute()
    {
        return date('M d, Y', strtotime($this->attributes['created_at']));
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    /** 
     * To get category list
     * @return object category list object
     */
    public function getCategoryList()
    {
        return DataTables::of(Category::query())

        ->addColumn('action', function($category){
            return $this->generateButton($category, 'category', ['edit', 'delete']);
        })

        ->rawColumns(['action'])
        ->make(true);
    }

    /** 
     * To save category data
     * @param array $validated validated values from category request
     * @return
     */
    public function saveCategory($validated)
    {
        $category = new Category();
        $category->name = $validated['name'];
        $category->save();
    }

    /** 
     * To update category data
     * @param array $validated validated values from category request
     * @param object $category category object
     * @return
     */
    public function updateCategory($validated, $category)
    {
        $category->name = $validated['name'];
        $category->save();
    }

    /** 
     * To delete category data
     * @param object $category category object
     * @return
     */
    public function deleteCategory($category)
    {
        $category->delete();
    }
}

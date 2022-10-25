<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * category model
     */
    protected $categoryModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    /**
     * To get category list
     * @return object category list object
     */
    public function getCategoryList()
    {
        return $this->categoryModel->getCategoryList();
    }

    /**
     * To show category list view
     * @return View category list view
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * To show create category view
     * @return view create category view
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * To save user
     * @param array $request validated values from category request
     * @return view category list view
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryModel->saveCategory($request);

        return redirect()->route('admin.category.index')->with('success', 'New Category Created Successfully');
    }

    /**
     * To show edit category view
     * @param object $category category object
     * @return view edit category view
     */
    public function edit(Category $category)
    {
        return view('admin.category.form', compact('category'));
    }

    /**
     * To update category
     * @param array $request validated values from category request
     * @param object $category category object
     * @return view category list view
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryModel->updateCategory($request, $category);

        return redirect()->route('admin.category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * To delete category
     * @return
     */
    public function destroy(Category $category)
    {
        $this->categoryModel->deleteCategory($category);
    }
}

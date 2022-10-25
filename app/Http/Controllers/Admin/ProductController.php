<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * product model
     */
    protected $productModel;

    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct()
    {
        $this->productModel = new Product();
    }

    /** 
     * To get product list
     * @return object product list object
     */
    public function getProductList()
    {
        return $this->productModel->getProductList();
    }

    /**
     * To show product list
     * @return view product list
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * To show create product view
     * @return view create product view
     */
    public function create()
    {
        $categories = $this->productModel->getCreateOrEditProductData();

        return view('admin.product.form', compact('categories'));
    }

    /**
     * To show product details view
     * @param object $product product object
     * @return view product list view
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * To save product
     * @param array $request validated values from product request
     * @return view product list view
     */
    public function store(ProductRequest $request)
    {
        $this->productModel->saveProduct($request);

        return redirect()->route('admin.product.index')->with('success', 'New Product Created Successfully');
    }

    /**
     * To show edit product view
     * @param object $product product object
     * @return view edit product view
     */
    public function edit(Product $product)
    {
        $categories = $this->productModel->getCreateOrEditProductData();

        return view('admin.product.form', compact('categories', 'product'));
    }

    /**
     * To update product
     * @param array $request validated values from product request
     * @param object $product product object
     * @return view product list view
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productModel->updateProduct($request, $product);

        return redirect()->route('admin.product.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * To delete product
     * @param object $product product object
     * @return
     */
    public function destroy(Product $product)
    {
        $this->productModel->deleteProduct($product);
    }
}

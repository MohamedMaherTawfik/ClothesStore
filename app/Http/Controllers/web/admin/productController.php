<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Services\brandServices;
use App\Services\categoreyServices;
use App\Services\productServices;
use Illuminate\Http\Request;

class productController extends Controller
{
    private $productServices;
    private $categoreyServices;
    private $brandServices;

    public function __construct(productServices $productServices, categoreyServices $categoreyServices, brandServices $brandServices)
    {
        $this->categoreyServices = $categoreyServices;
        $this->brandServices = $brandServices;
        $this->productServices = $productServices;
    }

    public function index()
    {
        $products = $this->productServices->allProducts();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandServices->getBrands();
        $categories = $this->categoreyServices->getAllCategorey();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    public function store(productRequest $request)
    {
        $fields = $request->validated();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // dd($fields);
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('product'), $name);
            $fields['image'] = $name;
            try {
                $this->productServices->createProduct($fields, null, null);
                return redirect('/dashboard/product')->with('success', 'product Created Successfully!');
            } catch (\Throwable $th) {
                dd($th);
                // return $th;
            }
        }
    }


    public function edit()
    {
        $product = $this->productServices->showProduct(request('id'));
        $brands = $this->brandServices->getBrands();
        $categories = $this->categoreyServices->getAllCategorey();
        return view('admin.product.edit', compact('product', 'brands', 'categories'));
    }

    public function update()
    {
        $fields = request()->all();
        $products = $this->productServices->updateProduct(request('id'), $fields, );
        return redirect()->route('product')->with('success', __('messages.update_Message'))->with('products', $products);
    }

    public function destroy()
    {
        $products = $this->productServices->deleteProduct(request('id'));
        return redirect()->route('product')->with('success', __('messages.delete_Message'))->with('products', $products);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
class AdminProductsController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->paginate(3);
        return view('admin.dashboard')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg|max:2048'    
        ]);

        $product = new Product();
        $product->name = filter_var($request['name'], FILTER_SANITIZE_STRING);
        $product->description = filter_var($request['description'], FILTER_SANITIZE_STRING);
        $product->description = filter_var($product->description, FILTER_SANITIZE_SPECIAL_CHARS);
        if($request->has('img')){
            $image = $request->file('img');
            $name = Str::slug($request->input('name'))."_".time();
            $folder = '/uploads/images/';
            $filepath = $folder . $name.  "." . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $product->image = $filepath;
        }
        $product->save();
        return view('admin.show')->with('product', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            return view('admin.show')->with('product', $product);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            return view('admin.edit')->with('product', $product);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            $product->name = filter_var($request->name, FILTER_SANITIZE_STRING);
            $product->description = filter_var($request->description, FILTER_SANITIZE_STRING);
            if($request->has('img')){
                $image = $request->file('img');
                $name = Str::slug($request->input('name'))."_".time();
                $folder = '/uploads/images/';
                $filepath = $folder . $name.  "." . $image->getClientOriginalExtension();
                $this->uploadOne($image, $folder, 'public', $name);
                $product->image = $filepath;
            }
        }
        $product->save();
        return view('admin.show')->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        } 
        return view('admin.dashboard');
    }
}

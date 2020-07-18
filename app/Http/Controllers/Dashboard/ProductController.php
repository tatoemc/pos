<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{ 
    
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->where('name','like', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(5);
        return view('dashboard.products.index', compact('categories', 'products'));
    }

    
    public function create()
    {
        //
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }
 
    
    public function store(Request $request)
    {
        //
         $request->validate([
            'name' => 'required',
            'description' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
            'category_id' => 'required' 
           
        ]); 

         $request_data = $request->all();

        Product::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.products.index');

    }
    
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('dashboard.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
       
        $request->validate([
            'name' => 'required'.$product->id,
            'description' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
            'category_id' => 'required' 
           
        ]);

    $request_data = $request->all();
        
        $product->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        if ($product->image != 'default.png') {

            Storage::disk('public_uploads')->delete('/product_images/' . $product->image);

        }//end of if

        $product->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');
    }

    public function percent(Request $request)
    {
       
       //->pluck('purchase_price','id')
       if ($request->percent) {
       
            $products = Product::select('id','sale_price')->get();
            
             
             foreach ($products as $product)   
             {
                
                $product_id = $product['id'];
                $product_sell = $product['sale_price'];

                $percent_update = $product_sell + ($product_sell*$request->percent/100);
                
                Product::where('id', $product_id)->update(['sale_price' => $percent_update]);
                
             }

             session()->flash('success', __('site.updated_successfully'));
             return view('dashboard.products.percent');


        }//end of if

        return view('dashboard.products.percent'); 
         
    } 
    public function calculator_percent()
    {
        

        /*
        
         */
        return view('dashboard.products.percent'); 
         
    } 
}

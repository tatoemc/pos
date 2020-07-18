<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use App\Client;
use Illuminate\Http\Request; 

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->latest()->paginate(10); 

        return view('dashboard.orders.index', compact('orders'));
    }

    public function products(Order $order)
    { 
        $invoice = $order->id;
        $client = $order->client_id;
        $clientname = Client::where('id',$client)->first();
        $products = $order->products;
        
        return view('dashboard.orders._products', compact('order', 'products','clientname','invoice'));

    }//end of products order_id ->pivot->order_id

   
    
    public function destroy(Order $order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.orders.index');
    
    }//end of order

   
}

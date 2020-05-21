<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use App\Pet;
use Auth;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->by_purchase_date)) {
            $orders = Order::orderBy('purchase_date', $request->by_purchase_date)->get();
        }
        else {
            $orders = Order::all();
        }

        if (isset($request->by_name)) {
            $pets = Pet::orderBy('pet_name', $request->by_name)->get();
        }
        else {
            $pets = Pet::all();
        }
        return view('history', compact('orders', 'pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $newOrder = new Order();
        // set the values for our $newOrders properties
        $newOrder->transaction_code = "AaF".time(); //get the exact time using time(), returns unix time epoch
        $newOrder->user_id = Auth::user()->id; //hard coded user id 1
        $newOrder->purchase_date = Carbon::now(); //We'll use the current timestamp from Carbon now()
        $newOrder->status_id = 1; //Processing
        $newOrder->total_price = 0; //initial total price of order, since we did not have the product of quantity * product's price
        // save the order to the orders table
        $newOrder->save();

        $total = 0;

        foreach ($request->session()->get('shelter') as $id => $quantity) {
            //to get the product details, we'll find the Products using the cart's $id, Then assign it to $product
            $pet = Pet::find($id);
            // get the subtotal for the product
            $subtotal = 1 * $pet->adoption_fee;
            $total += $subtotal;

            $pet->stocks = 2; //is the same as $product->stocks = $product->stocks - $quantity
            // on creating records on our pivot table, we use the attach(). And for the delete, we use detach() method
            $newOrder->pets()->attach($id); //quantity key name is based on the column additional column on our pivot table
            $pet->save();
        }

        $updateTotalPriceofOrder = Order::find($newOrder->id);
        $updateTotalPriceofOrder->total_price = $total;
        $updateTotalPriceofOrder->save();

        Session::forget("shelter");
        // $request->session()->forget("cart");
        Session::flash('message', 'Thank you for adopting! You request is submitted and we\'ll get back to you as soon as possible. Your reference no. is '. $newOrder->transaction_code.".");

        return redirect('/shelter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

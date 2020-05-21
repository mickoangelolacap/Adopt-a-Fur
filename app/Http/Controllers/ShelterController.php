<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Pet;

class ShelterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pet_shelter = [];

        if (Session::has('shelter')) {

            $shelter = Session::get('shelter');
            $total = 0;

            foreach ($shelter as $pet_id => $quantity) {
                $pet = Pet::find($pet_id);
                $pet->subtotal = 1 * $pet->adoption_fee;
                $total += $pet->subtotal;
                $pet_shelter[] = $pet;
            }

            return view('shelter', compact('pet_shelter', 'total'));
        }
        return view('shelter', compact('pet_shelter'));
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
         $request->validate([
            'pet_id' => 'required',
            'pet_name' => 'required',
            'quantity' => 'required|integer'
        ]);

        $id = $request->pet_id;
        $name = $request->pet_name;
        $quantity = $request->quantity;

        if ($request->session()->has('shelter')) {
            $shelter = $request->session()->get('shelter');
        }
        else {
            $shelter = [];
        }

        // $shelter[] += $id;
        if (isset($shelter[$id])){
            $shelter[$id] += $quantity;
        }
        else {
            $shelter[$id] = $quantity;   
        }
        // if (isset($shelter[$id])){
        //     // $shelter[$id] += $quantity;
        // }
        // else {
        //     $shelter[] = $id;   
        // }

        $request->session()->put('shelter', $shelter);

        $request->session()->flash('message', $name." has been added to your shelter!");
        return redirect('/catalog');
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
        // forget() helper, deletes specific item on our session
        Session::forget("shelter.$id"); //now this will forget the specific item (using its $id) on our session named cart
        // echo 'This will return a string even if the $variable is declared inside'; //returns $variable instead of the value itself
        // echo "$variable"; //return the value of the variable declared inside

        Session::flash('message', ' Your shelter has been updated!');
        return redirect('/shelter');
    }

    public function clear(){
        /*
            empty the session cart
        */
        Session::forget("shelter");
        return redirect('/shelter');
    }
}

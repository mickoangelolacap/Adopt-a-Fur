<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\Category;
use Session;

class PetController extends Controller
{
    function viewRescuePetPage(){
    	$categories = Category::all();
    	return view('pets.rescuepetform', compact('categories'));
    }

    function rescuePet(Request $request){

    	$request->validate([
    		'pet_name' => 'required|string',
    		'pet_age' => 'required|numeric',
    		'pet_category' => 'required',
    		'pet_gender' => 'required|string',
    		'pet_description' => 'required|string',
    		'pet_fee' => 'required|numeric',
    		'pet_image' => 'required|image'
    	]);

    	$pet_name = htmlspecialchars($request->pet_name);
    	$pet_age = htmlspecialchars($request->pet_age);
    	$pet_category = htmlspecialchars($request->pet_category);
    	$pet_gender = htmlspecialchars($request->pet_gender);
    	$pet_description = htmlspecialchars($request->pet_description);
    	$pet_fee = htmlspecialchars($request->pet_fee);
    	$pet_image = $request->file('pet_image');

    	$newPet = new Pet();
    	$newPet->pet_name = $pet_name;
    	$newPet->age = $pet_age;
    	$newPet->category_id = $pet_category;
    	$newPet->gender = $pet_gender;
    	$newPet->description = $pet_description;
    	$newPet->adoption_fee = $pet_fee;
    	$newPet->stocks = 0;

    	$file_name = time().".".$pet_image->getClientOriginalExtension();
    	$file_destination = "images/";
    	$pet_image->move($file_destination, $file_name);

    	$newPet->image = $file_destination.$file_name;

    	$newPet->save();
    	$request->session()->flash('message', 'Your Pet has been added to our pending lists!');
    	return redirect('/pet/form');
    }

    function viewPetList(Request $request){

        $removedPets = Pet::onlyTrashed()->get();

        if (isset($request->by_name)) {
            $pets = Pet::orderBy('pet_name', $request->by_name)->get();
        }
        else {
            $pets = Pet::all();
        }
        return view('pets.petlist', compact('pets', 'removedPets'));
    }

    function denyRescue($petid, $petname){
        $denyRescue = Pet::find($petid);
        $denyRescue->delete();
        Session::flash('message', $petname.'\'s request for rescue has been denied');
        return redirect('/pet/list');
    }

    function approveRescue($petid, $petname){
        $approveRescue = Pet::find($petid);
        $approveRescue->stocks = 1;
        $approveRescue->save();
        Session::flash('message', $petname.'\'s request for rescue has been approved');
        return redirect('/pet/list');
    }

    function denyAdoption($petid, $petname){
        $denyAdoption = Pet::find($petid);
        $denyAdoption->stocks = 1;
        $denyAdoption->save();
        Session::flash('message', $petname.'\'s request for adoption has been denied');
        return redirect('/pet/list');
    }
    
    function approveAdoption($petid, $petname){
        $approveAdoption = Pet::find($petid);
        $approveAdoption->stocks = 3;
        $approveAdoption->save();
        Session::flash('message', $petname.'\'s request for adoption has been approved');
        return redirect('/pet/list');
    }

    function failedScreening($petid, $petname){
        $failedScreening = Pet::find($petid);
        $failedScreening->stocks = 1;
        $failedScreening->save();
        Session::flash('message', $petname.'\'s screening failed');
        return redirect('/pet/list');
    }

    function passedScreening($petid, $petname){
        $passedScreening = Pet::find($petid);
        $passedScreening->stocks = 4;
        $passedScreening->save();
        Session::flash('message', $petname.'\'s screening passed');
        return redirect('/pet/list');
    }

    function viewCatalogPage(){
        $pets = Pet::all();
        return view('catalog', compact('pets'));
    }
    function removePet($petid, $petname){
        $removePet = Pet::find($petid);
        $removePet->delete();
        Session::flash('message', $petname.' has been removed permanently');
        return redirect('/pet/list');
    }

    function restorePet($petid, $petname){
        // first find the specific product using withTrashed then restore
        $restorePet = Pet::withTrashed()->find($petid)->restore();
        return redirect('/pet/list');
    }

}

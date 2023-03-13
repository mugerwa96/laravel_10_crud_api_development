<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepropertyRequest;
use App\Http\Requests\UpdatepropertyRequest;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PropertyController extends Controller
{
    
    // index

    public function index()
    {
        return property::all();
    }

    // creating a new property
    public function create(Request $request)
    {
       $validated=$request->validate([
        'name'=>'required',
        'description'=>'required',
        'price'=>'required'
       ]);
       $property= new property();
       $property->name=$request->name;
       $property->price=$request->price;
       $property->description=$request->description;
       $result=$property->save();
       if($result)
       {
        return ['message'=>'Property added successfully'];
       }else{
        return ['message'=>'Error in adding new property'];
       }

    }

    // show
    public function show($id)
    {
        
        if( property::find($id))
        {
            return property::find($id);
        }else{
            return ['message'=>'Property not found'];
        }
    }


    // delete
    public function delete($id)
    {
        $property=property::find($id);
        if($property)
        {
            $result=$property->delete();
            if($result)
            {
                return ['message'=>'Property removed successfully'];
            }else{
                return ['message'=>'Property failed to removed'];
            }
        }else{
            return ['message'=>'Property not found'];
        }
    }


    // update propertt
//  public function update()
//  {
//     return "Update";
//  }
    public function update(Request $request ,$id)
    {
        
           $property= property::find($id);
           
           $property->name=$request->name;
           $property->price=$request->price;
           $property->description=$request->description;
           $result=$property->update();
           if($result)
           {
            return ['message'=>'Property updated successfully'];
           }else{
            return ['message'=>'Error in updating new property'];
           }
    }
}
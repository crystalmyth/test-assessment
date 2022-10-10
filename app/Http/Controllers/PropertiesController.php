<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->paginate(16);
        // dd($properties);
        return view('pages.welcome', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property_types = PropertyType::all();
        return view('pages.create', compact('property_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property_type = PropertyType::Find($request->property_type);

        $property = new Property();
        $property->uuid = Str::uuid();
        $property->county = $request->county;
        $property->country = $request->country;
        $property->town = $request->town;
        $property->postcode = $request->postcode;
        $property->description = $request->description;
        $property->full_url = $request->full_url;
        $property->address = $request->address;
        $property->image_full = $request->image_full;
        $property->image_thumbnail = $request->image_thumbnail;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->num_bedrooms = $request->num_bedrooms;
        $property->num_bathrooms = $request->num_bathrooms;
        $property->price = $request->price;
        $property->type = $request->type;
        $property->property_type = json_encode($property_type);
        $property->full_url = 'xxxx';
        $property->from = 'web';

        if ($property->save()) {
            return response()->json([
                'message' => "Property Created Successfully !!"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $property_types = PropertyType::all();
        return view('pages.edit', compact('property', 'property_types'));
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
        $property = Property::Find($id);
        $property_type = PropertyType::Find($request->property_type);

        $property->county = $request->county;
        $property->country = $request->country;
        $property->town = $request->town;
        $property->postcode = $request->postcode;
        $property->description = $request->description;
        $property->full_url = $request->full_url;
        $property->address = $request->address;
        $property->image_full = $request->image_full;
        $property->image_thumbnail = $request->image_thumbnail;
        // $property->latitude = $request->latitude;
        // $property->longitude = $request->longitude;
        $property->num_bedrooms = $request->num_bedrooms;
        $property->num_bathrooms = $request->num_bathrooms;
        $property->price = $request->price;
        $property->type = $request->type;
        $property->property_type = json_encode($property_type);

        if ($property->save()) {
            return response()->json([
                'message' => "Property Updated Successfully !!"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Property::find($id)->delete()) {
            return response()->json([
                'message' => "Property Deleted Successfully !!"
            ]);
        }
    }
}

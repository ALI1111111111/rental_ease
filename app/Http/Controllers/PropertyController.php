<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('landlord_id', Auth::id())->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('properties.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'location' => 'required',
            'price' => 'required|numeric',
            'facilities' => 'nullable',
            'available_from' => 'required|date',
            'available_to' => 'nullable|date|after:available_from',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();

            // Attempt to move the uploaded image to the public/images directory
            if ($request->image->move(public_path('images'), $imageName)) {
                // File upload successful, proceed with property creation
            } else {
                // Error handling if the file upload fails
                return redirect()->back()->with('error', 'Failed to upload image.');
            }
        }

        $property = new Property([
            'landlord_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'facilities' => $request->facilities,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
            'image' => $imageName,
        ]);

        $property->save();

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $categories = Category::all();
        return view('properties.edit', compact('property', 'categories'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'location' => 'required',
            'price' => 'required|numeric',
            'facilities' => 'nullable',
            'available_from' => 'required|date',
            'available_to' => 'nullable|date|after:available_from',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

        $imagePath = $property->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('property_images', 'public');
        }

        $property->update([
            'landlord_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'price' => $request->price,
            'facilities' => $request->facilities,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
            'image' => $imagePath,
        ]);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully');
    }

}

<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('slider.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'image1' => 'required|image',
        'image2' => 'nullable|image',
        'image3' => 'nullable|image',
        'image4' => 'nullable|image',
        'title' => 'nullable|string',
        'subtitle' => 'nullable|string',
    ]);

    // Store images
    $image1Path = $request->file('image1')->store('sliders', 'public');
    $image2Path = $request->hasFile('image2') ? $request->file('image2')->store('sliders', 'public') : null;
    $image3Path = $request->hasFile('image3') ? $request->file('image3')->store('sliders', 'public') : null;
    $image4Path = $request->hasFile('image4') ? $request->file('image4')->store('sliders', 'public') : null;

    // Create slider entry
    Slider::create([
        'image1' => $image1Path,
        'image2' => $image2Path, // This will be null if not provided
        'image3' => $image3Path,
        'image4' => $image4Path,
        'title' => $request->title,
        'subtitle' => $request->subtitle,
    ]);

    return redirect()->route('slider.index')->with('success', 'Slider created successfully.');
}


    public function edit(Slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
        ]);
    
        // Update images if provided
        if ($request->hasFile('image1')) {
            $image1Path = $request->file('image1')->store('sliders', 'public');
            $slider->update(['image1' => $image1Path]);
        }
        if ($request->hasFile('image2')) {
            $image2Path = $request->file('image2')->store('sliders', 'public');
            $slider->update(['image2' => $image2Path]);
        }
        if ($request->hasFile('image3')) {
            $image3Path = $request->file('image3')->store('sliders', 'public');
            $slider->update(['image3' => $image3Path]);
        }
        if ($request->hasFile('image4')) {
            $image4Path = $request->file('image4')->store('sliders', 'public');
            $slider->update(['image4' => $image4Path]);
        }
    
        // Update other fields
        $slider->update($request->only('title', 'subtitle'));
    
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }
    

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}



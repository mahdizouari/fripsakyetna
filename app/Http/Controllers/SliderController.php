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
            'image2' => 'required|image',
            'image3' => 'required|image',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'link' => 'nullable|url',
        ]);

        // Store images
        $image1Path = $request->file('image1')->store('sliders', 'public');
        $image2Path = $request->file('image2')->store('sliders', 'public');
        $image3Path = $request->file('image3')->store('sliders', 'public');

        // Create slider entry
        Slider::create([
            'image1' => $image1Path,
            'image2' => $image2Path,
            'image3' => $image3Path,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
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
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'link' => 'nullable|url',
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

        // Update other fields
        $slider->update($request->only('title', 'subtitle', 'link'));

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }
}



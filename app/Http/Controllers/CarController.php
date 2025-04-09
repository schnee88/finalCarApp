<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Show list of all cars
    public function index()
    {
        $cars = auth()->user()->cars()
            ->withCount('comments')
            ->with(['comments' => function ($query) {
                $query->latest()->limit(3); // Rāda 3 jaunākos komentārus
            }])
            ->latest()
            ->get();

        return view('cars.index', compact('cars'));
    }

    // Show the create car form
    public function create()
    {
        return view('cars.create');
    }

    // Store a new car
    public function store(Request $request)
    {
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'registration_number' => 'required|string|unique:cars',
        ]);

        auth()->user()->cars()->create($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Mašīna pievienota veiksmīgi!');
    }

    // Show a single car (NEW METHOD)
    public function show(Car $car)
    {
        // Load comments with the car
        $car->load('comments.user');

        return view('cars.show', compact('car'));
    }

    // Delete a car
    public function destroy(Car $car)
    {
        $car->delete();
    return redirect()->route('cars.index')->with('success', 'Mašīna veiksmīgi dzēsta!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        // $events = Event::all();
        $events = auth()->user()->events;

        return view('events.index', compact('events', 'categories'));
    }

    public function show($id)
    {
        $event = Event::find($id);
    
        if (!$event) {
            abort(404); 
        }
    
        return view('events.singlepage', ['event' => $event]);
    }

    public function home()
    {
        $events = Event::all();

        return view('welcome', compact('events'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'date' => 'required|date',
            'capacity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'available_place' => 'nullable|integer',
            'validation_method' => 'required|in:manual,automatic',
                ]);
        $validatedData['user_id'] = auth()->id();
    
        Event::create($validatedData);
    
        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }
    
    


}

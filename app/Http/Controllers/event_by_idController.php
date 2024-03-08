<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use Illuminate\Http\Request;

class event_by_idController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();
        $events = auth()->user()->events;
        // $events = Event::all();
        return view('profile.events_by_id', compact('events','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'date' => 'required|date',
            'capacity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'available_place' => 'nullable|integer',
            'validation_method' => 'required|in:manual,automatic',
        ]);
        $validatedata['user_id'] = auth()->id();
         Event::create($validatedata);
         return redirect()->back()->with('success', 'Event ');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

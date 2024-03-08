<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $events = Event::where('status','pending')->get();
        // $events = auth()->user()->events;

        return view('events.index', compact('events', 'categories'));
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('query');

            // Dump the query for debugging
            dump("Search query: $query");

            // Perform the search based on the title
            $events = Event::where('title', 'like', '%' . $query . '%')->get();

            // Dump the search results for debugging
            dump($events);

            return response()->json($events);
        } catch (\Exception $e) {
            Log::error("Error during search: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred during search.']);
        }
    }

    public function filter(Request $request)
    {
        $searchQuery = $request->input('search');
        $category = $request->input('category');
        $categories = Categorie::all();
        $query = Event::query();
        if ($searchQuery) $query->where('title', 'LIKE', '%' . $searchQuery . '%');
        if ($category) $query->where('category_id', '=', $category);

        $events = $query->paginate(9);
        return view("welcome", ['events' => $events, 'searchQuery' => $searchQuery, 'categories' => $categories]);
    }

    public function show($id)
    {
        $event = Event::find($id);
        return view('events.singlepage', ['event' => $event]);
    }

    public function home()
    {
        $events = Event::all();
        $categories = Categorie::all();

        return view('welcome', compact('events','categories'));
    }


    public function accept($id)
    {
        $event = Event::find($id);
        $event->status = 'accepted';
        $event->save();

        return redirect()->back()->with('success', 'Event accepted successfully');
    }


public function reject($id)
{
    $event = Event::find($id);
    $event->status = 'rejected';
    $event->save();

    return redirect()->back()->with('error', 'Event rejected');
}



public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'address' => 'required|string|max:255',
        'date'=>'required',
        'capacity' => 'required|integer',
        'category_id' => 'required|exists:categories,id',
        'available_place' => 'nullable|integer',
        'validation_method' => 'required|in:manual,automatic',
        'price' => 'required|numeric',
    ]);

    // Set the default status to 'pending'
    $validatedData['status'] = 'pending';

    // Assign the user_id to the authenticated user
    $validatedData['user_id'] = auth()->id();

    Event::create($validatedData);

    return redirect()->route('events.index')->with('success', 'Event created successfully. Awaiting admin approval.');
    
    
}

}

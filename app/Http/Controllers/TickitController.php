<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tickit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TickitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bookNow(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $existingReservation = Tickit::where('event_id', $event->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('warning', "You have already booked {$existingReservation->event->title}.");
        }

        $systemDate = Carbon::now();
        $eventDate = Carbon::parse($event->event_date);

        if ($systemDate->greaterThan($eventDate)) {
            $status = 'cancelled';

            return redirect()->back()->with('error', 'The event date has passed. Reservation is cancelled.');
        } else {
            $status = ($event->reservation_status == 'automatic') ? 'approved' : 'pending';
        }

        $reservation = Tickit::create([
            'event_id' => $event->id,
            'user_id' => auth()->user()->id,
            'status' => $status,
        ]);

        return redirect()->back()->with('success', "{$reservation->event->title} created successfully");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $tickits = Tickit::where('status','pending')->get();
        $events = Event::all();
        $users = User::all();
        return view('profile.tickits',compact('tickits','events','users'));
    }


    public function accept($id)
    {
        $ticket = Tickit::findOrFail($id);
        $ticket->update(['status' => 'accepted']);
        // Implement your logic for accepting the ticket
        return redirect()->back()->with('success', 'Ticket accepted successfully');

    }
    
    public function refuse($id)
    {
        $ticket = Tickit::findOrFail($id);
        // Implement your logic for refusing the ticket
        $ticket->update(['status' => 'refused']);

        return redirect()->back()->with('success', 'Ticket refused successfully');
    }
    
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

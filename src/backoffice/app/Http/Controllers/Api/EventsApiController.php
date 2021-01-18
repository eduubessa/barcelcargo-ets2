<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json([
            'events' => Event::limit(5)->get(),
            'events_with_trains' => Event::with('trains')->get(),
            'allEvents' => Event::all()
        ]);
    }
}

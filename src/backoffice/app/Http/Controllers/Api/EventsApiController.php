<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function store(StoreEventRequest $request)
    {
        $user = User::where('username', auth()->user()->username)->first();

        if($request->hasFile('photo')){
            $path = $request->photo->storeAs('images', Hash::make(microtime()));
            dd($path);
        }

        $event = new Event();
        $event->user_id = $user->id;
        $event->photo = "http://digitalcardmarketing.com/application/assets/global/img/no-photo.jpg";
        $event->train_id = 1;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->body = $request->input('body');
        $event->event_at = $request->input('event_at');
        $event->slug = \Str::slug($request->input('title') . "-" . str_replace('.', '', microtime()));
        $event->save();

        return redirect()->route('views.events');
    }

    public function update(UpdateEventRequest $request, $slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $event->train_id = 2;
        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->body = $request->input('body');
        $event->event_at = $request->input('event_at');
        $event->save();

        return redirect()->route('views.events');
    }

    public function drop($slug)
    {
        $event = Event::where('slug', $slug)->delete();

        return redirect()->route('views\.events');
    }
}

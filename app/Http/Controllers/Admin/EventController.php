<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\UpdateEventRequestRequest;
use App\Models\Event;
use App\Services\FileService;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{

    public function __construct(private FileService $fileService){}

    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }


    public function store(StoreEventRequest $request)
    {

        $event_image_url = $this->fileService->processImage($request->image, 1024000, public_path('/images/event_images/'), 'event', 3, 3);
        Event::create($request->validated() + [
                'image_url' => $event_image_url,
            ]);
        Session::flash('message', 'Event created successfully');
        return redirect()->back();
    }


    public function show(Event $event)
    {
        return response()->json([
            'event' => $event
        ]);
    }


    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->validated());

        if ($request->hasFile('image')) {

            $event_image_url = $this->fileService->processImage($request->image, 1024000, public_path('/images/event_images/'), 'event', 3, 3);
            $this->fileService->removeFile(public_path('/images/event_images/' . $event->image_url));
            $event->update(['image_url' => $event_image_url]);
        }

        session()->flash('message', 'Event Updated Successfully');
        return redirect()->back();
    }


    public function destroy(Event $event)
    {
        $event->delete();
        Session::flash('message', 'Event deleted successfully');
        return redirect()->back();
    }

}

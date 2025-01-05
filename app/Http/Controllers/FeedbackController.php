<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Events\Registered;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Railway;
use App\Notifications\RepliedNotification;
use Inertia\Inertia;
use Illuminate\Support\Str;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Feedbacks', [
            'feedbacks' => Feedback::all()->load('user', 'railway'),
            'railways' => Railway::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Feedback', [
            'lines' => Railway::all()->load('stations'),
        ]);
    }

    /**
     * User submits feedback.
     */
    public function submit(StoreFeedbackRequest $request)
    {
        $request->validated();
        if (auth()->check()) {
            Feedback::create([
                'content' => $request->content,
                'rating' => $request->rating,
                'railway_id' => $request->railway_id,
                'user_id' => auth()->id(),
            ]);
        } else {
            $creator = new CreateNewUser;
            $input = $request->all();
            $input['name'] = $input['username'];
            $input['password'] = Str::password();
            $input['password_confirmation'] = $input['password'];
            event(new Registered($user = $creator->create($input), $input['password']));
            auth()->guard()->login($user, $request->boolean('remember'));
            Feedback::create([
                'content' => $request->content,
                'rating' => $request->rating,
                'railway_id' => $request->railway_id,
                'user_id' => auth()->id(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
        $request->validated();
        Feedback::create([
            'content' => $request->content,
            'rating' => $request->rating,
            'railway_id' => $request->railway_id,
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Reply to a feedback.
     */
    public function reply(Feedback $feedback)
    {
        $feedback->update([
            'reply' => request('reply'),
            'admin_id' => auth()->id(),
        ]);
        $feedback->user->notify(new RepliedNotification($feedback));
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
    }
}

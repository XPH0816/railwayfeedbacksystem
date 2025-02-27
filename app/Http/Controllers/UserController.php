<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Railway;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $railways = Railway::all();
        $bestRailway = $railways->sortByDesc('rating')->first() ?? new Railway(['name' => 'No railways']);

        $worstRailway =
            $railways->filter(fn($railway) => $railway->rating !== null && $railway->rating > 0)->sortBy('rating')->first() ?? new Railway(['name' => 'No railways']);

        return Inertia::render('Dashboard', [
            'bestRailway' => $bestRailway,
            'worstRailway' => $worstRailway,
            'railways' => $railways->map(function ($railway) {
                return [
                    'id' => $railway->id,
                    'name' => $railway->name,
                    'rating' => $railway->rating,
                ];
            }),
        ]);
    }


    public function users()
    {
        return Inertia::render('Users', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        (new UpdateUserProfileInformation())->update($user, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->deleteOrFail();
    }
}

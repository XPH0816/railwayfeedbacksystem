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
        if ($railways->sortByDesc('rating')->first()->rating == null) {
            $bestRailway = new Railway(['name' => 'No railways']);
        } else {
            $bestRailway = $railways->sortByDesc('rating')->first();
        }

        if ($railways->sortBy('rating')->first()->rating == null) {
            $worstRailway = new Railway(['name' => 'No railways']);
        } else {
            $worstRailway = $railways->sortBy('rating')->first();
        }

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

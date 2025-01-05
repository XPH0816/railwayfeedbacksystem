<?php

namespace App\Http\Controllers;

use App\Models\Railway;
use App\Http\Requests\StoreRailwayRequest;
use App\Http\Requests\UpdateRailwayRequest;
use Inertia\Inertia;

class RailwayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Railways', [
            'railways' => Railway::all(),
        ]);
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
    public function store(StoreRailwayRequest $request)
    {
        $request->validated();
        Railway::create($request->only(['name']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Railway $railway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Railway $railway)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRailwayRequest $request, Railway $railway)
    {
        $request->validated();
        $railway->update($request->only(['name', 'status']));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Railway $railway)
    {
        $railway->deleteOrFail();
    }
}

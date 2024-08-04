<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFamilyRequest;
use App\Http\Resources\FamilyResource;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::with([
            'cpus',
            'manufacturer',
        ])
        ->paginate(10);

        return FamilyResource::collection($families)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamilyRequest $request)
    {
        $validated = $request->validated();

        $newFamily = Family::create([
            'manufacturer_id' => $validated['manufacturer_id'],
            'type' => $validated['type'],
            'name' => $validated['name'],
        ]);

        return FamilyResource::make($newFamily)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        return FamilyResource::make($family)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $validated = $request->validated();

        $family->update([
            'manufacturer_id' => $validated['manufacturer_id'],
            'type' => $validated['type'],
            'name' => $validated['name'],
        ]);
        return FamilyResource::make($family)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();

        return FamilyResource::make($family)->response();
    }
}

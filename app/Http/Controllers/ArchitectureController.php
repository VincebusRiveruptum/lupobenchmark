<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArchitectureRequest;
use App\Http\Resources\ArchitectureResource;
use App\Models\Architecture;
use Illuminate\Http\Request;

class ArchitectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $architectures = Architecture::with([
            'manufacturer',
            'cpus',
        ]);

        return ArchitectureResource::collection($architectures)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArchitectureRequest $request)
    {
        $validated = $request->validated();

        $newArch = Architecture::create([
            'manufacturer_id' => $validated['manufacturer_id'],
            'type' => $validated['type'],
            'name' => $validated['name'],
        ]);

        return ArchitectureResource::make($newArch)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Architecture $architecture)
    {
        return ArchitectureResource::make($architecture)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Architecture $architecture)
    {
        $validated = $request->validated();

        $architecture->update([
            'manufacturer_id' => $validated['manufacturer_id'],
            'type' => $validated['type'],
            'name' => $validated['name'],
        ]);

        return ArchitectureResource::make($architecture)->response();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Architecture $architecture)
    {
        $architecture->delete();

        return Architecture::make($architecture)->response();
    }
}

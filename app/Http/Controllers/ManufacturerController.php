<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;
use App\Http\Resources\ManufacturerResource;
use App\Models\Manufacturer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manufacturer = Manufacturer::paginate(10);

        return ManufacturerResource::collection($manufacturer)->response();
    }

    public function show(Manufacturer $manufacturer)
    {
        return ManufacturerResource::make($manufacturer)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManufacturerRequest $request)
    {
        $validated = $request->validated();

        $manufacturer = Manufacturer::create([
            'type' => $validated['id'],
            'name' => $validated['name'],
        ]);

        return ManufacturerResource::collection($manufacturer)->response();
    }

    /**
     * Display the specified resource.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        try{
            $validated = $request->validated();

            $manufacturer->update([
                'type' => $validated['type'],
                'name' => $validated['name'],
            ]);

            return new JsonResponse(
                data: [
                    'data' => $manufacturer,
                ],
                status: JsonResponse::HTTP_OK,
            );
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return new JsonResponse(
                status: JsonResponse::HTTP_NOT_FOUND,
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacturer $manufacturer)
    {
        try{
            $manufacturer->delete();
            return new JsonResponse(
                data:[
                    'data' => $manufacturer,
                ],
                status: JsonResponse::HTTP_OK,
            );
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return new JsonResponse(
                status: JsonResponse::HTTP_NOT_FOUND,
            );
        }
    }
}

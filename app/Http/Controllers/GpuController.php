<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGpuRequest;
use App\Http\Requests\UpdateGpuRequest;
use App\Http\Resources\GpuResource;
use App\Models\Gpu;
use Illuminate\Http\Request;

class GpuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gpus = Gpu::with([
            'hardware_device_id',
            'gpu_detail_id',
            'gpu_render_detail_id',
            'gpu_memory_detail_id',
            'gpu_bus_interace_id',
            'model_name',
            'release_date',
        ])->paginate(10);

        return GpuResource::collection($gpus)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGpuRequest $request)
    {
        $validated = $request->validated();

        $newGpu = Gpu::create([
            'hardware_device_id' => $validated['hardware_device_id'],
            'gpu_detail_id' => $validated['gpu_detail_id'],
            'gpu_render_detail_id' => $validated['gpu_render_detail_id'],
            'gpu_memory_detail_id' => $validated['gpu_memory_detail_id'],
            'gpu_bus_interface_id' => $validated['gpu_bus_interface_id'],
            'model_name' => $validated['model_name'],
            'release_date' => $validated['release_date'],
        ]);

        return GpuResource::make($newGpu)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Gpu $gpu)
    {
        return GpuResource::make($gpu)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGpuRequest $request, Gpu $gpu)
    {
        $validated = $request->validated();

        $gpu->update([
            'hardware_device_id' => $validated['hardware_device_id'],
            'gpu_detail_id' => $validated['gpu_detail_id'],
            'gpu_render_detail_id' => $validated['gpu_render_detail_id'],
            'gpu_memory_detail_id' => $validated['gpu_memory_detail_id'],
            'gpu_bus_interface_id' => $validated['gpu_bus_interface_id'],
            'model_name' => $validated['model_name'],
            'release_date' => $validated['release_date'],
        ]);

        return GpuResource::make($gpu)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gpu $gpu)
    {
        $gpu->delete();

        return GpuResource::make($gpu)->response();
    }
}

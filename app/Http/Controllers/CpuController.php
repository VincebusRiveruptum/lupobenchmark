<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCpuRequest;
use App\Http\Requests\UpdateCpuRequest;
use App\Http\Resources\CpuResource;
use App\Models\Cpu;
use Illuminate\Http\JsonResponse;

class CpuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cpus = Cpu::with([
            'architecture',
            'family',
            'cpu_socket',
            
        ])->paginate(10);


        /*

        $collection = CpuResource::collection($cpus);

        This was the old approach, is much more verbose

        return new JsonResponse(
            data: [
                    'data' => $collection,
                    'meta' => collect($collection->resource->toArray())->forget('data')
                ],
            status: JsonResponse::HTTP_OK,
        );
        */

        return CpuResource::collection($cpus)->response();
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
    public function store(StoreCpuRequest $request)
    {
        $validated = $request->validated();

        $newCpu = Cpu::create([
            //'hardware_device_id' => $validated['hardware_device_id'],
            'architecture_id' => $validated['architecture_id'],
            'family_id' => $validated['family_id'],
            'cpu_socket_id' => $validated['cpu_socket_id'],
            'model_name' => $validated['model_name'],
            'release_date' => $validated['release_date'],
            'cores' => $validated['cores'],
            'e_cores' => $validated['e_cores'],
            'p_cores' => $validated['p_cores'],
            'threads' => $validated['threads'],
            //'l1_cache' => $validated['l1_cache'],
            //'l2_cache' => $validated['l2_cache'],
            //'l3_cache' => $validated['l3_cache'],
            'base_clock' => $validated['base_clock'],
            'tdp' => $validated['tdp'],
            'source' => $validated['source'],
        ]);

        return new JsonResponse(
            data: [
                'data' => $newCpu
            ],
            status: JsonResponse::HTTP_CREATED,
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Cpu $cpu)
    {
        return CpuResource::make($cpu);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cpu $cpu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCpuRequest $request, Cpu $cpu)
    {
        $validated = $request->validated();

        $cpu->update([
            //'hardware_device_id' => $validated['hardware_device_id'],
            'architecture_id' => $validated['architecture_id'],
            'family_id' => $validated['family_id'],
            'cpu_socket_id' => $validated['cpu_socket_id'],
            'model_name' => $validated['model_name'],
            'release_date' => $validated['release_date'],
            'cores' => $validated['cores'],
            'e_cores' => $validated['e_cores'],
            'p_cores' => $validated['p_cores'],
            'threads' => $validated['threads'],
            //'l1_cache' => $validated['l1_cache'],
            //'l2_cache' => $validated['l2_cache'],
            //'l3_cache' => $validated['l3_cache'],
            'base_clock' => $validated['base_clock'],
            'tdp' => $validated['tdp'],
            'source' => $validated['source'],
        ]);

        return new JsonResponse(
            data: [
                'data' => $request,
            ],
            status: JsonResponse::HTTP_OK,
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cpu $cpu)
    {
        $removed = $cpu;

        $cpu->delete();

        return new JsonResponse(
            data: [
                'data' => $removed
            ],
            status: JsonResponse::HTTP_OK,
        );
    }
}

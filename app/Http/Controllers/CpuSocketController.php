<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCpuSocketRequest;
use App\Http\Requests\UpdateCpuSocketRequest;
use App\Http\Resources\CpuResource;
use App\Http\Resources\CpuSocketResource;
use App\Models\CpuSocket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CpuSocketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $cpuSocket = CpuSocket::paginate();

        return CpuSocketResource::collection($cpuSocket)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCpuSocketRequest $request){
        //
        $validated = $request->validated();

        $newCpuSocket = CpuSocket::create([
            'name' => $validated['name'],
        ]);

        return CpuSocketResource::make($newCpuSocket)->response();
    }

    /**
     * Display the specified resource.
     */

    public function show(CpuSocket $cpuSocket){
        return CpuSocketResource::make($cpuSocket)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCpuSocketRequest $request, CpuSocket $cpuSocket){
        $validated = $request->validated();

        $cpuSocket->update([
            'name' => $validated['name'],
        ]);
        return CpuSocketResource::make($cpuSocket)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CpuSocket $cpuSocket){
        $cpuSocket->delete();

        return CpuSocketResource::make($cpuSocket)->response();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCpuSocketRequest;
use App\Http\Requests\UpdateCpuSocketRequest;
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

        CpuSocket::create([
            'name' => $validated['name'],
        ]);

        return new JsonResponse(
            data:[
                'data'=> $validated,
            ],
            status: JsonResponse::HTTP_OK,
        );
    }

    /**
     * Display the specified resource.
     */

    public function show(CpuSocket $cpuSocket){
        return new JsonResponse(
            data:[
                'data' => $cpuSocket,
            ],
            status: JsonResponse::HTTP_OK,
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCpuSocketRequest $request, CpuSocket $cpuSocket){
        $validated = $request->validated();

        $cpuSocket->update([
            'name' => $validated['name'],
        ]);

        return new JsonResponse(
            data:[
                'data' => $validated,
            ],
            status: JsonResponse::HTTP_OK,
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CpuSocket $cpuSocket){
        $cpuSocket->delete();

        return new JsonResponse(
            data: [
                'data' => $cpuSocket,
            ],
            status: JsonResponse::HTTP_OK,
        );
    }
}

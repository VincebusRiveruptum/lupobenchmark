<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGpuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hardware_device_id' => ['nullable'],
            'gpu_detail_id' => ['sometimes', Rule::exists('gpu_details', 'id')],
            'gpu_render_detail_id' => ['sometimes', Rule::exists('gpu_render_details','id')],
            'gpu_memory_detail_id' => ['sometimes', Rule::exists('gpu_memory_details', 'id')],
            'gpu_bus_interface_id' => ['sometimes', Rule::exists('gpu_bus_interfaces', 'id')],
            'model_name' => ['nullable', 'string', 'max:255'],
            'release_date' => ['nullable', 'date'],
        ];
    }
}

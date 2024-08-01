<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCpuRequest extends FormRequest
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
            'architecture_id' => ['nullable', 'numeric', Rule::exists('architectures','id')],
            'family_id' => ['nullable', 'numeric', Rule::exists('families','id')],
            'cpu_socket_id' => ['nullable', 'numeric', Rule::exists('cpu_sockets', 'id')],
            'model_name' => ['nullable', 'string'],
            'release_date' => ['nullable'],
            'cores' => ['nullable', 'integer'],
            'e_cores' => ['nullable', 'integer'],
            'p_cores' => ['nullable', 'integer'],
            'threads' => ['nullable', 'integer'],
            'l1_cache' => ['nullable', 'integer'],
            'l2_cache' => ['nullable', 'integer'],
            'l3_cache' => ['nullable', 'integer'],
            'base_clock' => ['nullable','float'],
            'tdp' => ['nullable', 'integer'],
            'source' => ['nullable', 'string'],
        ];
    }
}

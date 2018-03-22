<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DestroyTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param Task $task
     *
     * @return void
     */
    public function authorize()
    {
        dd(Auth::user()->can('delete', $this->route('task')));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

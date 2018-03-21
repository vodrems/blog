<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function save(SaveTask $request) {

        Auth::user()->tasks()->create($request->all());

        return redirect('/');
    }
}

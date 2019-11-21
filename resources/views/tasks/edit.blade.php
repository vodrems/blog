@extends('layouts.app')

@section('content')
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Task</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $task->name }}">
            </div>

            @if ($errors->has('name'))
                <span>
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Update
                </button>
            </div>
        </div>
    </form>
@endsection
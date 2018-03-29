@extends('layouts.app')

@section('content')
    <div class="panel-body">
    @include('common.errors')

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>
                                    {{ $task->name }}
                                </div>
                            </td>

                            <td>
                                @can('delete', $task)
                                    <form action="{{ url('tasks/'.$task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                @endcan
                                @can('update', $task)
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    </div>
@endsection
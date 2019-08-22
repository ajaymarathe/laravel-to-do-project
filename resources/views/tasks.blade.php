@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8 " >
                <div class="card">
                    <div class="card-body" >
                        <!-- Display Validation Errors -->
                        @include('common.errors')

                        <!-- New Task Form -->
                        <form action="/task" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Task</label>

                                    <input type="text" name="name" id="task-name" class="form-control">
                            </div>

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </form>
                    
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        <!-- Create Task Form... -->

                        <!-- Current Tasks -->
                        @if (count($tasks) > 0)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Current Tasks
                                </div>

                                <div class="panel-body">
                                    <table class="table table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead>
                                            <th>Task</th>
                                            <th>&nbsp;</th>
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <!-- Task Name -->
                                                    <td class="table-text">
                                                        <div>{{ $task->name }}</div>
                                                    </td>

                                                     <!-- Delete Button -->
                                                    <td>
                                                        <form action="/task/{{$task->id}}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <button class="btn btn-danger btn-sm">Delete Task</button>
                                                        </form>
                                                    </td>
                                                    {{-- Edit button --}}
                                                    <td>
                                                       <a href="/edit/{{ $task->id }}" class="btn btn-info btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <!-- TODO: Current Tasks -->
@endsection
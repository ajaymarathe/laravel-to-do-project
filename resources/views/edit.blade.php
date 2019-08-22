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
                        <form action="/edit/{{ $tasks[0]->id }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}

                            <!-- Task Name -->
                            <div class="form-group">
                                <label for="task" class="col-sm-3 control-label">Task</label>

                                <input type="text" name="name" value="{{ $tasks[0]->name }}" id="task-name" class="form-control">
                                <input type="hidden" name="id" value="{{ $tasks[0]->id }}">
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

            </div>

        </div>
    </div>

    <!-- TODO: Current Tasks -->
@endsection
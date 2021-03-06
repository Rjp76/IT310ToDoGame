@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tasks</div>

                    <div class="card-body">

                        {{$task->body}}
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary float-right"
                           href="{{ route('task.edit',['task_id'=> $task->id])}}">
                            Edit Tasks
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
            </div>
@endsection
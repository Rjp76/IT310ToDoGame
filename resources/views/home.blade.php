@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tasks
                        <a class="btn btn-primary float-right" href="{{ route('task.create') }}">
                            Create a Question
                        </a>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($task as $tasks)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $tasks->created_at->diffForHumans() }}

                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$tasks->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right"
                                                       href="{{ route('task.show', ['task_id' => $tasks->id]) }}">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can  create a question.
                                @endforelse

                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $task->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center mb-4">Title</h1>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{ $task->title }}</p>
                </div>
            </div>
            <h1 class="text-center mt-4">Description</h1>
            <div class="card mt-4">
                <div class="card-body">
                    <p class="card-text">{{ $task->description }}</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('edit_task', $task->id) }}" class="btn btn-primary">Edit this Task</a>
            </div>
        </div>
    </div>
</div>

@endsection
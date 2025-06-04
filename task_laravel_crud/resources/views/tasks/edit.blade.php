@extends('layouts.master')
@section('title', 'Edit Record')
@section('content')
    <div class="contaner mt-3">
        <div class="row mx-auto">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header alert alert-primary">
                        <h2 class="text-center">Edit Task</h2>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('update-record', $task->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="due_date">Due Date:</label>
                                    <input type="datetime-local" name="due_date" class="form-control" value="{{ $task->due_date->format('Y-m-d\TH:i') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" class="form-control" name="image" class="form-control-file">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Task</button>
                                <a href="{{route('/')}}" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

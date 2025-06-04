@extends('layouts.master')
@section('title', 'List Record')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header alert alert-primary">
                    <div class="row">
                        <div class="col-lg-6"><h1>Show Records</h1></div>
                        <div class="col-lg-6 text-right">
                            <a class="btn btn-info text-left btn-lg" href="{{ route('add-record') }}">Create New Record</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover " id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Completed</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $key=>$task)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ $task->title ?? ''}}</td>
                                        <td>{{ $task->description ?? ''}}</td>
                                        <td>{{ $task->due_date ?? ''}}</td>
                                        <td>
                                            <a href="{{route('record', $task->id ?? '')}}" class="badge text-white bg-{{$task->is_completed ? 'success':'danger'}}">
                                                {{$task->is_completed ? 'Yes' : 'No'}}
                                            </a>
                                        </td> 
                                        <td>
                                            @if ($task->image)
                                                <img src="{{ asset('images/' . $task->image ?? '') }}" alt="Image" width="100">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('edit-record', $task->id) }}"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" href="{{ route('delete-record', $task->id) }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
   
@endsection

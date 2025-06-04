@extends('layouts.master')
@section('title', 'Create Record')
@section('content')
<div class="contaner mt-4">
    <div class="row mx-auto">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 ">
            <div class="card">
                <div class="card-header alert alert-primary">
                    <h2 class="text-center">Create Record</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('store-record') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <b class="text-danger">*</b></label>
                            <input type="text" name="title" id="title" placeholder="enter title" class="form-control" >
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description <b class="text-danger">*</b></label>
                            <textarea name="description" class="form-control" id="description" placeholder="enter description"></textarea>
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date <b class="text-danger">*</b></label>
                            <input type="datetime-local" class="form-control" name="due_date" id="due_date" >
                            @error('due_date')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image <b class="text-danger">*</b></label>
                            <input type="file" class="form-control" name="image" id="image">
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <button class="btn btn-secondary" type="submit">Save Record</button>
                        <a href="{{route('/')}}" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   
  

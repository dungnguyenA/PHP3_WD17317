@extends('layouts.layout')

@section('content')
    <div class="content-page">
        <div class="content">
        <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Add brands</h2>
                </div>
               
            </div>
        </div>
        <!-- @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif -->
        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
            
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Brand Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Brand Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Brand Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="Brand description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Brand Logo:</strong>
                        <input type="file" name="logo" class="form-control" placeholder="Brand logo">
                        @error('logo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
    @endsection
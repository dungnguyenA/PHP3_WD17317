@extends('admin.layouts.layout')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Sửa danh mục</h2>
            </div>
        </div>
    </div>
    <!-- @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif -->
    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên danh mục:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Nhập danh mục">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Mô tả:</strong>
                    <input type="text" name="description" value="{{ $category->description }}" class="form-control" placeholder="Nhập mô tả">
                    @error('description')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-success ml-3">Sửa danh mục</button>

    </form>
</div>
@endsection

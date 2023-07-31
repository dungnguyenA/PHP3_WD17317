@extends('admin.layouts.layout')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Sửa sản phẩm</h2>
                </div>
            </div>
        </div>
        <!-- @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif -->
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tên sản phẩm:</strong>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Nhập tên sản phẩm">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Giá sản phẩm:</strong>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Nhập giá sản phẩm">
                        @error('price')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Số lương:</strong>
                        <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" placeholder="Nhập số lượng">
                        @error('quantity')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
              
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ảnh:</strong>
                        <input type="file" name="image" value="{{ $product->logo }}" class="form-control" placeholder="Brand logo">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mô tả:</strong>
                        <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Nhập mô tả">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 
            <div class="form-group col-md-4">
                <label for="category_id" class="col-form-label">Danh mục</label>
                <select name="category_id" id="category_id"  class="form-control">
                @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="brand_id" class="col-form-label"> Thương hiệu</label>
                <select name="brand_id" id="brand_id"  class="form-control">
                @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                </select>
            </div>
            </div>
            <button type="submit" class="btn btn-success ml-3">Sửa sản phẩm</button>

        </form>
    </div>
    @endsection
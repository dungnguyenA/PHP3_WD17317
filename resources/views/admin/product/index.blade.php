@extends('admin.layouts.layout')

@section('content')

    <div class="content-page">
        <div class="content">
        <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Danh sách sản phẩm</h2>
                </div>
                
            </div>
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Ảnh</th>
                    <th>Mô tả</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>

                    
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <img src="{{asset('/storage/images/'.$product->image)}}" style="height: 50px;width:100px;">
                        </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->brand_id }}</td>

                        
                       
                        <td>
                            <form action="{{ route('product.destroy',$product->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
           
        </table>
        <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('product.create') }}"> New Procuct</a>
                </div>
    </div>
    @endsection
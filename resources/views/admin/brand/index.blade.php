@extends('admin.layouts.layout')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Danh sách thương hiệu</h2>
                </div>
               
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
                    <th>Tên thương hiệu</th>
                    <th>Mô tả </th>
                    <th>Ảnh</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->description }}</td>
                        <td>
                            <img src="{{asset('/storage/images/'.$brand->logo)}}" style="height: 50px;width:100px;">
                        </td>
                        <td>
                            <form action="{{ route('brand.destroy',$brand->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('brand.edit',$brand->id) }}">Edit</a>
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
                    <a class="btn btn-success" href="{{ route('brand.create') }}"> New brand</a>
                </div>
        
    </div>
    @endsection
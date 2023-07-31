@extends('admin.layouts.layout')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Danh mục</h2>
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
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorys as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                       
                        <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
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
                    <a class="btn btn-success" href="{{ route('category.create') }}"> New category</a>
                </div>
    </div>
    @endsection
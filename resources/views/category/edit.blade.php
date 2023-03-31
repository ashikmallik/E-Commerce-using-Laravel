@extends('layout.app')
@section('page-title','home')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">create your new slider</h4>
        </div>
        <div class="card-body">
            <form action="{{route('category.update',$category->id)}}" method="post" >
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">category name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{$category->name}}">
                </div>
                <div class="mb-3">
                    <a href="{{route('slider.index')}}" class="btn btn-warning">back</a>
                    <input type="submit" class="btn btn-info" value="update">
                </div>
            </form>
        </div>
    </div>
                        

@endsection
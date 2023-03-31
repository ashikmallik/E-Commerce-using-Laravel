@extends('layout.app')
@section('page-title','home')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">create your new slider</h4>
        </div>
        <div class="card-body">
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">title</label>
                    <input type="text" name="title" class="form-control" id="" placeholder="input your title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">sub title</label>
                    <input type="text" name="sub_title" class="form-control" id="" placeholder="input your title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">image</label>
                    <input type="file" name="image" class="form-control" id="" placeholder="input your file">
                </div>
                <div class="mb-3">
                    <a href="{{route('slider.index')}}" class="btn btn-warning">back</a>
                    <input type="submit" class="btn btn-info" value="submit">
                </div>
            </form>
        </div>
    </div>
                        

@endsection
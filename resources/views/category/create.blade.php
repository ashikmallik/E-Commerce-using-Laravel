@extends('layout.app')
@section('page-title','home')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">create your new category</h4>
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">category name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="input your title">
                </div>
              
                <div class="mb-3">
                    <a href="{{route('category.index')}}" class="btn btn-warning">back</a>
                    <input type="submit" class="btn btn-info" value="submit">
                </div>
            </form>
        </div>
    </div>
                        

@endsection
@extends('layout.app')
@section('page-title','home')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">create your new slider</h4>
        </div>
        <div class="card-body">
            <form action=" {{route('item.update',$items->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Item name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{$items->name}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" id="" class="form-control">
                        @foreach($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Item price</label>
                    <input type="text" name="price" class="form-control" id="" value="{{$items->price}}">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Item details</label>
                    <textarea name="details" class="form-control">{{$items->details}}</textarea>
                </div>
               
              
                <div class="mb-3">
                    <a href="{{route('item.index')}}" class="btn btn-warning">back</a>
                    <input type="submit" class="btn btn-info" value="update" name="submit">
                </div>
            </form>
        </div>
    </div>
                        

@endsection
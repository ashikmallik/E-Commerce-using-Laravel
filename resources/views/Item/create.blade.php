@extends('layout.app')
@section('page-title','home')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">create your new category</h4>
        </div>
        <div class="card-body">
            <form action="{{route('item.store')}}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Item name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="input your item name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                    <select name="category" id="" class="form-control">
                        @foreach($category as $categories )
                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                        @endforeach
                        
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Item price</label>
                    <input type="text" name="price" class="form-control" id="" placeholder="input your price">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Item details</label>
                    <textarea name="details" id="" cols="30" rows="10" class="form-control" id="" placeholder="input your price"></textarea>
                </div>
               
              
                <div class="mb-3">
                    <a href="{{route('item.index')}}" class="btn btn-warning">back</a>
                    <input type="submit" class="btn btn-info" value="submit">
                </div>
            </form>
        </div>
    </div>
                        

@endsection
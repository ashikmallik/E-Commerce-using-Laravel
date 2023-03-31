@extends('layout.app')
@section('page-title','home')

@section('content')

    <div><a href="{{route('item.index')}}" class="btn btn-info mb-4">Create</a></div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>sl</th>
            <th>item name</th>
            <th>item price</th>
            <th>category</th>
            <th>details</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $key=>$item)
       <tr>
        <td>{{$key+1}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->category->name}}</td>
        <td>{{$item->details}}</td>
        <td><a href="{{route('item.edit',$item->id)}}" class="btn btn-info">edit</a>

        <form action="{{route('item.destroy',$item->id)}}" method="post" id="delete-form-{{$item->id}}">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn btn-danger" onclick="if(confirm('are you sure you went to be delete?')){
                    event.preventDefault();
                    document.getElementById('delete-form-{{$item->id}}').submit();
                }else{
                    event.preventDefault();
                }">delete</button>
        </td>
       </tr>
    @endforeach
      
    </tbody>
</table>
                    
@endsection
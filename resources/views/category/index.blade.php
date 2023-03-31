@extends('layout.app')
@section('page-title','home')

@section('content')

    <div><a href="{{route('category.create')}}" class="btn btn-info mb-4">Create</a></div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>sl</th>
            <th>category name</th>
            <th>category slug</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($category as $key =>$categorys)
       <tr>
        <td>{{$key+1}}</td>
        <td>{{$categorys->name}}</td>
        <td>{{$categorys->slug}}</td>
        <td><a href="{{route('category.edit',$categorys->id)}}" class="btn btn-info">edit</a>

        <form action="{{route('category.destroy',$categorys->id)}}" method="post" id="delete-form-{{$categorys->id}}">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn btn-danger" onclick="if(confirm('are you sure you went to be delete?')){
                    event.preventDefault();
                    document.getElementById('delete-form-{{$categorys->id}}').submit();
                }else{
                    event.preventDefault();
                }">delete</button>
        </td>
       </tr>
    @endforeach
      
    </tbody>
</table>
                    
@endsection
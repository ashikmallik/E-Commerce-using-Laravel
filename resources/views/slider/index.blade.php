@extends('layout.app')
@section('page-title','home')

@section('content')

    <div><a href="{{route('slider.create')}}" class="btn btn-info mb-4">Create</a></div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>sl</th>
            <th>title</th>
            <th>sub title</th>
            <th>image</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $key=>$slider)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$slider->title}}</td>
            <td>{{$slider->sub_title}}</td>
            <td><img src="{{ asset('uploads/slider/'.$slider->image) }}" style="height:70px; width: 150px;"></td>
            <td>
                <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info">edit</a>
                <form action="{{route('slider.destroy',$slider->id)}}" method="post" id="delete-form-{{$slider->id}}">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn btn-danger" onclick="if(confirm('are you sure you went to be delete?')){
                    event.preventDefault();
                    document.getElementById('delete-form-{{$slider->id}}').submit();
                }else{
                    event.preventDefault();
                }">delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                    
@endsection
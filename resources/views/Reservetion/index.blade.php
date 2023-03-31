@extends('layout.app')
@section('page-title','home')

@section('content')

    <div><a href="" class="btn btn-info mb-4">Create</a></div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>sl</th>
            <th>name</th>
            <th> email</th>
            <th>phone</th>
            <th>date & time</th>
            <th>person</th>
            <th>status</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($Reservetions as $key=>$Reservetion)
       <tr>
        <td>{{$key+1}}</td>
        <td>{{$Reservetion->name}}</td>
        <td>{{$Reservetion->email}}</td>
        <td>{{$Reservetion->phone}}</td>
        <td>{{$Reservetion->date}} & {{$Reservetion->time}} </td>
        <td>{{$Reservetion->person}}</td>
       
        <td> @if($Reservetion->status == 1)
                <span class="badge badge-success">confirm</span>
            @endif
            @if($Reservetion->status == 0)
                <span class="badge badge-danger">wating</span>
            @endif
        </td>
        <td>
            @if($Reservetion->status == 0)
        <form action="{{route('reservetion.status',$Reservetion->id)}}" method="post" id="status-form-{{$Reservetion->id}}" style="display:none;">
                    @csrf
                </form>
                <button type="button" class="btn btn-info" onclick="if(confirm('are you sure you went to be delete?')){
                    event.preventDefault();
                    document.getElementById('status-form-{{$Reservetion->id}}').submit();
                }else{
                    event.preventDefault();
                }">Complete</button>
                @endif

        <form action="{{route('Reservetion.destroy',$Reservetion->id)}}" method="post" id="delete-form-{{$Reservetion->id}}">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn btn-danger" onclick="if(confirm('are you sure you went to be delete?')){
                    event.preventDefault();
                    document.getElementById('delete-form-{{$Reservetion->id}}').submit();
                }else{
                    event.preventDefault();
                }">delete</button>
        </td>
       </tr>
    @endforeach
      
    </tbody>
</table>
                    
@endsection
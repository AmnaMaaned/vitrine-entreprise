@extends('layouts.admin')
@section('content')
<br>
name : {{$cat->name}}<br> 


Title:{{$cat->Title}}<br> 
Status:{{$cat->status}}<br> 
Description:{{$cat->description}}<br> 
<a href="edit/">Edit</a>
<a href="destroy">Delete</a>

@endsection
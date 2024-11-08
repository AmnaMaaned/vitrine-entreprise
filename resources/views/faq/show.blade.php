@extends('layouts.default')
@section('content')
<br><br><br>
Question : 
{{$faq->question}}
<br> 

Response: {{$faq->response}}

<br>
<!-- {{$fq->product->name}} -->

          <br>
<a href="edit/">Edit</a>
<a href="destroy">Delete</a>

@endsection
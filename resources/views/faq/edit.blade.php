@extends('layouts.admin')
    @section('content')


    @if(session('msg'))
    {{session('msg')}}
    @endif
    <div class="demo">
    <div class="row">
   <center><h3> Edit FAQ</h3></center>
   <br/>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="container">
      <form method="post" action="/faq/{{ $faqcase->id }}">
          <div class="form-group">
              @csrf
              @method('post')
              <label for="question">Question:</label>
              <input type="text" class="form-control" name="question" value="{{$faqcase->question }}"/>
          </div>
          <div class="form-group">
               <label for="cases">Response :</label>
             <input type="text" class="form-control" name="response" value="{{$faqcase->response }}"/>
          </div>
      
          <button type="submit" class="btn1">Update</button>
</div>
      </form>
  </div>
</div>
<br><br>
@endsection

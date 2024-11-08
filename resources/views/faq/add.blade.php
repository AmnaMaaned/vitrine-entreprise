@extends('layouts.admin')
    @section('content')


    @if(session('msg'))
    {{session('msg')}}
    @endif

    <h3>Add FAQ</h3>
 

  <div class="demo">
    <form action="/faq" method="POST" enctype="multipart/form-data" class='admin'>
      @csrf
  
      <div class="row">
      <div class="col-25">
        <label for="question">Question</label>
      </div>
      <div class="col-75">
        <input type="text" id="question" name="question" placeholder="Question..">
      </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="response">Response</label>
      </div>
      <div class="col-75">
        <input type="text" id="response" name="response" placeholder="Response..">
      </div>
      </div>
      
      <div class="row">
      <div class="col-25">
        <label for="response">Product_id</label>
        </div>
      <div class="col-75">
      <select name="product_id"  data-placeholder="Choose a products..." class="chosen-select">
        <option>Choose a products..</option>
         @foreach($products as $prod)
  
        <option value='{{$prod->id}}'>{{$prod->name}}</option>
          @endforeach    
      </select>
      </div>
      </div>
  
      <div class="row">
      <input type="submit" value="Submit" class="btn1">
    </div>
  
     
    </form>
  </div><br><br>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

  @endsection


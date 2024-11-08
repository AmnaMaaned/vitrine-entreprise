@extends('layouts.admin')
    @section('content')


    @if(session('msg'))
    {{session('msg')}}
    @endif

    <h3>Add Category</h3>
 

  <div class="demo">
    <form action="/categories" method="POST" enctype="multipart/form-data" class='admin'>
      @csrf
      <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Your name..">
      </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="title">Title :</label>
      </div>
      <div class="col-75">
        <input type="text" id="title" name="title" placeholder="Title..">
      </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="status">Status :</label>
      </div>
      <div class="col-75">
  
        <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" id="status" name="status" >

</div>
      </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="description">Description :</label>
      </div>
      <div class="col-75">
     <textarea class="form-control" id="description" name="description"></textarea>
      </div>
      </div>
     
     <div class="row">
      <div class="col-25">
        <label for="short-description">Short_description :</label>
      </div>
      <div class="col-75">

        <textarea id="short_description" name="short_description" placeholder="Write something.." style="height:120px"></textarea>
      </div>
      </div>
   
      <div class="row">
      <div class="col-25">
        <label for="banner_image">Banner_image :</label>
      </div>
      <div class="col-75">
        <input type="file" id="banner_image" name="banner_image"/>
        </div>
      </div>
      <div class="row">
      <div class="col-25">
        <label for="preview_image">Preview_image :</label>
      </div>
      <div class="col-75">
        <input type="file" id="preview_image" name="preview_image"/>
        </div>
      </div>
  
      <div class="row">
      <input type="submit" value="Submit" class="btn1">
    </div>
      
     
    </form>
  </div><br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
@endsection
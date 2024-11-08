
@extends('layouts.admin')
    @section('content')
   
    @if(session('msg'))
    {{session('msg')}}
    @endif

<h3> Edit applications</h3>
<div class="demo">
    <div class="row">

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
      <form method="post" action="/applications/{{ $applicationcase->id }}"  enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('post')
            
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{$applicationcase->name }}"/>
          </div>
            
   
          <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      
      <div class="col-75">
      <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" id="status" name="status"  @if($applicationcase->status) checked  @endif>

</div>
      
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Category</label>
    <select name="categories[]" multiple >
              @foreach($category as $cat)
          <option value='{{$cat->id}}'
             
          @foreach($applicationcase->category as $app_cat)
        
        

          @if($cat->id==$app_cat->id) selected  @endif   
          @endforeach 
        
          
          >{{$cat->Name}}</option>
            @endforeach
    </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">

      <textarea class="form-control" id="description" name="description">{{ $applicationcase->description}}</textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="short_description">short_description</label>
      </div>
      <div class="col-75">

      <textarea class="form-control" id="short_description" name="short_description">{{ $applicationcase->short_description}}</textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
      <label for="products[]">Products</label>
          <select name="products[]" multiple >
          @foreach($products as $prod)
          <option value='{{$prod->id}}' 
          
          @foreach($applicationcase->products as $app_prod)
        
        

          @if($prod->id==$app_prod->id) selected  @endif   
          @endforeach 
          >
          {{$prod->name}}
        </option>
           @endforeach
    </select>
    </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="banner_image">Banner</label>
      </div>
      <div class="col-75">
        <input type="file"  name="banner_image" value="{{$applicationcase->banner_image}}"/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="preview_image">Preview</label>
      </div>
      <div class="col-75">
        <input type="file"  name="preview_image" value="{{$applicationcase->preview_image}}"/>
      </div>
      <img src="/storage/{{ $applicationcase->preview_image }}" width="300px" height="300px"/>
    </div>
 



          <button type="submit" class="btn1">Update</button>
</div>
      </form>
  </div>
</div>
<br><br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

@endsection
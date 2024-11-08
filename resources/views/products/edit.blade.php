@extends('layouts.admin')
    @section('content')
   
    @if(session('msg'))
    {{session('msg')}}
    @endif
  



   <h3> Edit products</h3>
    <div class="demo">
   
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
      <form method="post" action="/products/{{ $productcase->id }}" enctype="multipart/form-data">
        @csrf
          <!-- <div class="form-group">
              @csrf
              @method('post')
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $productcase->name }}"/>
          </div> -->
          <div class="row">
      <div class="col-25">
        <label for="lname">Name</label>
      </div>
      <div class="col-75">
        
        <input type="text"  name="name" value="{{ $productcase->name }}"/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
      <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" id="status" name="status"  @if($productcase->status) checked  @endif>

</div>
        <!-- <input type="text"  name="status" value="{{ $productcase->status }}"/>  -->
      </div>
    </div>

    
    <div class="row">
      <div class="col-25">
        <label for="description">Desription</label>
      </div>
      <div class="col-75">
    
      <textarea class="form-control" id="description" name="description">{{ $productcase->description}}</textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="short_description">Short_desription</label>
      </div>
      <div class="col-75">
      <textarea rows="5" columns="5" class="form-control" name="short_description">{{ $productcase->short_description}}</textarea>

      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="banner_image">Banner_image</label>
      </div>
      <div class="col-75">
        <input type="file"  name="banner_image" value="{{$productcase->banner_image }}"/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="preview_image">Preview_image</label>
      </div>
      <div class="col-75">
        <input type="file"  name="preview_image" value="{{$productcase->preview_image }}"/>
      </div>
    </div>
        
           </div> 
          <button type="submit" class="btn1" >Update</button>
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

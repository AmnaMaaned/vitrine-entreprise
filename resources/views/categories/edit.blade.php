@extends('layouts.admin')
    @section('content')


    @if(session('msg'))
    {{session('msg')}}
    @endif

    <div class="demo">
    <div class="row">
   <center><h3> Edit category</h3></center>
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
      <form method="post" action="/categories/{{ $categorycase->id }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('post')
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{$categorycase->Name }}"/>
          </div>
          <div class="form-group">
               <label for="cases">Title :</label>
             <input type="text" class="form-control" name="title" value="{{$categorycase->Title }}"/>
          </div>
          <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
      <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" id="status" name="status"  @if($categorycase->status) checked  @endif>

</div>

      </div>
    </div>
          
          <div class="form-group">
              <label for="description">Description :</label>
              <textarea rows="5" columns="5" class="form-control" name="description">{{ $categorycase->Description}}</textarea>
          </div>
          <div class="form-group">
              <label for="short_description">Short_description :</label>
              <textarea rows="5" columns="5" class="form-control" name="short_description">{{ $categorycase->short_description}}</textarea>
          </div>
          <br>
          <div class="form-group">
            <label for="banner_image">Banner_image</label>
             <input type="file" name="banner_image" value="{{$categorycase->banner_image }}"/><br/>
           </div>
           <div class="form-group"><br>
            <label for="preview_image">Preview_image</label>
             <input type="file" name="preview_image" value="{{$categorycase->preview_image }}"/><br/>
           </div>
          <button type="submit" class="btn1">Update</button>
</div>
      </form>
  </div>
</div>
<br><br>
@endsection

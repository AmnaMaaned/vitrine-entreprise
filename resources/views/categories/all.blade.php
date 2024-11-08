
 @extends('layouts.admin')
    @section('content')

    @if(session('msg'))
    {{session('msg')}}
    @endif

  
  
    <meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container">
      <h2>All Category</h2>
      <table class="table">
        <thead>
          <tr>
      <th>Name</th>
        <th>Title</th>
        <th>Status</th>
        <th>Description</th>
        <th>short_description</th>
        <th>banner_image</th>
        <th>preview_image</th>
        <th>Options</th>
          </tr>
        </thead>
        <tbody>
        @foreach($category as $cat)

          <tr>
          <td>{{$cat->Name}}</td>
        <td>{{$cat->Title}}</td>
        <td> @if($cat->Status)
             published
         @else
            not published
         @endif
           </td>
        <td>{{$cat->Description}}</td>
        <td>{{$cat->short_description}}</td>
        <td><img src="/storage/{{$cat->banner_image}}" width="80px"height="80px"/></td>
        <td><img src="/storage/{{$cat->preview_image}}" width="80px" height="80px"/></td>
        

 
        <td><a href="{{route('showCat',$cat->slug)}}" >Show</a>

         <a href="{{route('editcat',$cat->id)}}" >Edit</a><br>
         <button  onclick="Mdelete('/categories/{{$cat->id}}')">Delete</button></td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>

 

<script type="text/javascript">
  
  function Mdelete(url) {
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    $.ajax({
      url: url,
      type: 'DELETE',
      success: function(result) {
     console.log('success');
     location.reload();

      }

    });
  }
</script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>

@endsection

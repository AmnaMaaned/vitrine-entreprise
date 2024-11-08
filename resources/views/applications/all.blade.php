@extends('layouts.admin')
    @section('content')

    @if(session('msg'))
    {{session('msg')}}
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
 
<div class="container">
      <h2>All Applications</h2>
      <table class="table">
        <thead>
          <tr>
          <th>Name</th>
        <th>Status</th>
        <th>short_description</th> 
  
        <th>Banner</th>
        <th>Preview</th>
        <th>Products</th>
        <th>Category</th>
        <th>Options</th>
          </tr>
        </thead>
        <tbody>
    @foreach($applications as $application)
    <tr>
        <td>{{$application->name}}</td>
       <td> @if($application->status)
             published
         @else
            not published
         @endif
           </td>
        <td>{{$application->short_description}}</td>
     
        <td><img src="/storage/{{$application->banner_image}}" width="100px" height="100px"/></td>
     
     <td><img src="/storage/{{$application->preview_image}}" width="100px" height="100px"/></td>
        <td>
          @foreach($application->products as $prod)
           {{$prod->name}}
          @endforeach
        </td>
        <td>
          @foreach($application->category as $cat)
           {{$cat->Name}}
          @endforeach
        </td>
        <td><a href="{{route('showApp',$application->slug)}}" >Show</a>
        <!-- <td><a href="{{url('applications/show/' .$application->slug)}}" >Show</a>   -->
        <a href="{{route('editapp',$application->id)}}" >Edit</a>
       
        
        <button  onclick="Mdelete('/applications/{{$application->id}}')">Delete</button>
        
      </td>

    </tr>
    @endforeach
    </tbody>
</table>
  <div class="container">
    <form action="/products/" method="POST">
      @csrf

    </form>
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

@endsection
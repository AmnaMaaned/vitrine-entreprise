
 @extends('layouts.admin')
    @section('content')

    @if(session('msg'))
    {{session('msg')}}
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="container">
      <h2>All Products</h2>
      <table class="table">
        <thead>
          <tr>
          <th>Name</th>
      <th>Status</th>
      <!-- <th>Description</th> -->
      <th>Short description</th>
  
      <th>Banner</th>
      <th>Preview</th>
      <th>Options</th>
          </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          <tr>
          <td>{{$product->name}}</td>
      <td>
      <!-- 
             <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" id="status" name="status"   @if($product->status) checked  @endif  
      onchange="changestatus(this,'{{$product->id}}')" >
      -->
        @if($product->status)
     published
     @else
     not published
     @endif 

     

      </td> 
      <!-- <td>{{$product->description}}</td> -->
      <td>{{$product->short_description}}</td>
      <td><img src="/storage/{{$product->banner_image}}" width="80px" height="80px"/></td>
        <td><img src="/storage/{{$product->preview_image}}" width="80px" height="80px"/></td>
     
  
     <td><a href="{{route('editprod',$product->id)}}">Edit</a>
     <a href="{{route('showProd',$product->slug)}}" >Show</a>  
     <button  onclick="Mdelete('/products/{{$product->id}}')">Delete</button>
      </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
<br>
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
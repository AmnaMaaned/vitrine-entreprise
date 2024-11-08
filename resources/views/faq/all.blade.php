
 @extends('layouts.admin')
    @section('content')

    @if(session('msg'))
    {{session('msg')}}
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">


   <div class="container">
  

   <h2>All FAQ</h2>
      <table class="table">
        <thead>
        <tr>
         <th>Question</th>
        <th>Response</th>
        <th>Product_id</th>
        <th>Options</th>
          </tr>
        </thead>
        <tbody>
        @foreach($faq as $fq)
          <tr>
          <td>{{$fq->question}}</td>
        <td>{{$fq->response}}</td>
     
        <td>
        

        {{$fq->product->name}}
        
        </td>
        
       
        <td><a href="{{route('showF',$fq->id)}}" >Show</a>
     <a href="{{route('editF',$fq->id)}}" >Edit</a>
        <button  onclick="Mdelete('/faq/{{$fq->id}}')">Delete</button>
      </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

@endsection

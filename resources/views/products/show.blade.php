@extends('layouts.default')
@section('content')
<br><br><br><br>
<body>
    
<div class="container">
<?php 
 echo htmlspecialchars_decode(stripslashes($product->description));?>
<br>
</div>
</body>

@endsection
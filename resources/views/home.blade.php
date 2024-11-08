@extends('layouts.admin')

@section('content')
<br><br><br> 
<div class="container">
    <div class="row justify-content-center">
        
        <br> <br>  <br> 
        
        <div class="w3-container">
 

  <div class="w3-panel w3-card"> <a href="products"> <h4>Products</h4></a></div>
  <div class="w3-panel w3-card-2"><a href="categories"><h4>Category</h4></a></div>
  <div class="w3-panel w3-card-4">  <a href="applications"><h4>Applications</h4></a></div>
  <div class="w3-panel w3-card-4">   <a href="faq"><h4>FAQ</h4></a></div>
  <div class="w3-panel w3-card-4">  <a href="{{ url('/logout') }}"><h4>Logout</h4></a></div>
 </div>
        <br><br><br> 
        
    </div>
    </div>
    
    
</div>
<br><br><br> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<br><br><br> 
@endsection

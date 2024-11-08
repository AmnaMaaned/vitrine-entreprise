 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        
        <h1><a href="/">EMWORKS</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="/#about">About</a></li>
          <li><a class="nav-link scrollto" href="/#services">Services</a></li>
         
         
          <li class="dropdown"><a href="/#products"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
          
             <ul>
               <li>
                   @foreach($products as $product)  
                 <a href="{{route('showProd',$product->slug)}}">{{$product->name}}</a>
                 @endforeach
                </li>
         
               </ul>
            </li> 

       <li class="dropdown"><a href="/#applications"><span>Applications</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            @foreach($category as $cat)  
              <li class="dropdown"><a href="#"><span>{{$cat->Name}}</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                            @foreach($cat->applications as $application)  
                                    <li><a href="{{route('showApp',$application->slug)}}">{{$application->name}}</a></li>
                 
                              @endforeach
                 
                </ul>
              </li>
              @endforeach
            </ul>
          </li>
       
  <li><a class="nav-link scrollto" href="/#faq">FAQ</a></li>
   <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
        
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
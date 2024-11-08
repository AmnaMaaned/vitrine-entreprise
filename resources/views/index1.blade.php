@extends('layouts.default')
@section('content')

@endsection
    <header id="header" class="fixed-top d-flex align-items-center">
            @include('includes.header')
        </header>

 

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
      <h1>Welcome to EMWorks</h1>
   
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-xl-6 col-lg-7" data-aos="fade-right">
            <!-- <img src="/img/about-img.jpg" class="img-fluid" alt=""> -->
            <video width="550" height="350"controls class="video">
             <source src="https://www.emworks.com/media/videos/EMS%20for%20SOLIDWORKS%20-%20Short%20Introductory%20Video.mp4" type="video/mp4">
            <source src="mov_bbb.oz" type="video/ogg">

           </video>
           </div>
        

           <div class="col-xl-6 col-lg-5 pt-5 pt-lg-0">
             <br>
            <h3 data-aos="fade-up"> Electromagnetic Simulation Software</h3>
            <h4  data-aos="fade-up">  With built-in Thermal, Motion and Structural Analyses</h4>
            <br>
            <p data-aos="fade-up">
            EMWorks provides best-in-class electromagnetic simulation software for electrical and electronics design with multiphysics capabilities. The company’s products are fully and seamlessly embedded in SOLIDWORKS and Autodesk Inventor®. Applications include electromechanical and power electronics, antennas, RF and microwave components, power and signal integrity of high speed interconnects.
            </p>
            
        </div> 

      </div>
    </section><!-- End About Section -->
  
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          
        </div>
        <!-- <div class="container1"> -->
        <div class="row">
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Consulting and Design Services</a></h4>
              <p class="description">EMWorks consulting and design services can help you save money and time to incorporate simulation in your design process and thereby get your products to market before your competitors</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">A Wide Range of Applications </a></h4>
              <p class="description">Like our electromagnetic simulation software tools, our consulting and design services cover a wide range of applications including</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box icon-box-green">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">SOLIDWORKS API </a></h4>
              <p class="description">Because our software tools are Gold Certified Add-ins to SOLIDWORKS, we have developed over the last decade an extensive and in-depth expertise with the SOLIDWORKS APIs</p>
            </div>
          </div>

      

        </div>
        <!-- </div> -->
      </div>
    </section><!-- End Services Section -->
      <!-- ======= products Section ======= -->
      <section id="products" class="features">
      <div class="container">
      <div class="section-title" data-aos="fade-up">
          <h2>Products</h2>
        
        </div>
        
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
            <ul class="nav nav-tabs flex-column">
             
            @foreach($products as $key  =>$product) 
              <li class="nav-item">
                <a class="nav-link  @if($key==0) active @endif show" data-bs-toggle="tab" href="#tab-{{ $key}}">
                  <h4>{{$product->name}}</h4>
             
             
             
                  <p>  {{$product->short_description}}</p>
                
                </a>
              </li>
              
              @endforeach 

      
            </ul>
          </div>
         
          <div class="col-lg-7 ml-auto" data-aos="fade-left">
        
            <div class="tab-content"> 
            <br><br> 
            @foreach($products as $key  =>$product)

              <div class="tab-pane @if($key==0) active @endif how" id="tab-{{ $key}}">
              
                <figure>
               
                  <img src="/storage/{{$product->preview_image}}" width="400px" heigth="400px" alt="" class="img-fluid">
                 
                </figure>
            
              </div>
              @endforeach
              <!-- <div class="tab-pane" id="tab-2">
                <figure>
                  <img src="/img/features-2.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-3">
                <figure>
                  <img src="/img/features-3.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-4">
                <figure>
                  <img src="/img/features-4.png" alt="" class="img-fluid">
                </figure>
              </div> -->
         
            </div>
         
          </div>
          
        </div>
        
      </div>
      
    </section><!-- End Features Section -->
    <!-- ======= Team Section ======= -->
    <section id="applications" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Applications</h2>
          <p>EMWorks products cover a very wide range of applications including motors, generators, linear and rotational actuators, relays, magnetic recording heads, magnetic levitation, loud speakers, coils, permanent magnets, sensors, high power, high voltage, PCBs, transformers, inverters, converters, bus bars, inductors, insulation studies, electrostatic discharge.</p>
        </div>
     
        <div class="row">
        @foreach($applications as $application)
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up">
      

          <div class="member">
              
              <img src="/storage/{{$application->preview_image}}" width="600px" height="600px"class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
            
                  <h4>@foreach($application->category as $cat)
                                 {{$cat->Name}}
                          @endforeach
</h4>
                </div>
               
              </div>
              
            </div>
           
          </div>
          @endforeach
        

    
        </div>
      
      </div>
   
    </section><!-- End Team Section -->

  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>F.A.Q</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
  
        <div class="faq-list">
        
          <ul>
          @foreach($faq as $fq)
            <li data-aos="fade-up">
            
              <i class="bx bx-help-circle icon-help"></i> 
        
              <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">
             
            
              {{$fq->question}}
              <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>

              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
      
              <p>
              {{$fq->response}}
                </p>
            
              </div>
            
            </li>
            @endforeach
          </ul>
        
        </div>

      </div>
    </section><!-- End F.A.Q Section -->

  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row no-gutters justify-content-center" data-aos="fade-up">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Cité Abes, Tataouine 3200</p>
              </div>

              <div class="email mt-4">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>sales@emworks-tn.com</p>
              </div>
       
              <div class="phone mt-4">
                <i class="bi bi-phone"></i>
                <h4> North America:</h4>
                <p>+1 800 397 1557</p>
              </div>
              <div class="phone mt-4">
                <i class="bi bi-phone"></i>
                <h4>International:</h4>
                <p>+1 (514) 612 0503</p>
              </div>
            </div>

          </div>

          <div class="col-lg-5 d-flex align-items-stretch">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31851.14654124324!2d10.456840817009175!3d32.952610150665215!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8050c3b9e513b117!2sCyberparc%20Tataouine!5e0!3m2!1sfr!2stn!4v1644512673117!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>


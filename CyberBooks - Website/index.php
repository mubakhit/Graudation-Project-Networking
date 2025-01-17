<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Digital Library</title>

  <link href="//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
  <header class="w3l-header">
    <div class="hero-header-11">
      <div class="hero-header-11-content">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light py-md-2 py-0 px-0">
            <a class="navbar-brand" href="index.php"><i class="fa fa-shield" aria-hidden="true"></i></i> CyberBooks </a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
              <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @@about-active">
                  <a class="nav-link" href="user/books.php">Books</a>
                </li>
                <li class="nav-item @@services-active">
                  <a class="nav-link" href="user/login.php">Login</a>
                </li>
                <li class="nav-item @@contact-active">
                  <a class="nav-link" href="user/register.php">Register</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- //header -->
  <!--  Main banner section -->
  <section class="w3l-main-banner">
    <div class="companies20-content">
      <div class="companies-wrapper">
        <div class="container">
          <div class="banner-item">
            <div class="banner-view">
              <div class="banner-info">
                <h3 class="banner-text">
                  Learn CyberSecurity, Free<br> Improve your skills.
                </h3>
                <p class="my-4 mb-sm-5">We believe everyone has the capacity to be creative. Skill is a place where people develop their own potential.
                </p><br>
                <a href="user/login.php" class="btn btn-primary theme-button mr-3">Login</a>
                <a href="user/books.php" class="btn btn-outline-primary theme-button">Books</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  //Main banner section -->
  <section class="w3l-index5" id="about">
    <div class="new-block py-5">
      <div class="container py-lg-3">
        <div class="header-section text-center">
          <h3>How we can help you?</h3>
          <p class="mt-3 mb-5">Welcome to your new digital library! Whether you're a lifelong learner, a voracious reader, or a student in need of reliable references, we've got something for you. </p>
          <a href="user/login.php" class="btn btn-primary theme-button">Join Now</a>
        </div>
      </div>
    </div>
  </section>



  <!-- footer -->
  <footer class="w3l-footer-29-main" id="footer">
    <div class="footer-29 py-5">
      <div class="container pb-lg-3">
        <div class="row footer-top-29">
          <div class="col-lg-6 col-md-6 footer-list-29 footer-1 mt-md-4">
            <a class="footer-logo mb-md-3 mb-2" href="#"><i class="fa fa-shield" aria-hidden="true"></i> CyberBooks</a>
            <p>Welcome to your new CyberBooks website Whether you're a lifelong learner, a hunger reader, or a student in need of reliable references, we've got something for you. </p>
          </div>


          <div class="col-lg-6 col-md-6 footer-list-29 footer-4 mt-5">
            <h6 class="footer-title-29">Quick Links</h6>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="user/books.php">Books</a></li>
              <li><a href="user/login.php">Login</a></li>
              <li><a href="user/register.php">Register</a></li>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="footers14-block" class="py-3">
      <div class="container">
        <div class="footers14-bottom text-center">
          <div class="copyright mt-1">
            <p>&copy; 2024 CyberBooks. All Rights Reserved to Ubunzu & Saeed</p>
          </div>
        </div>
      </div>
    </div>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      <span class="fa fa-angle-up" aria-hidden="true"></span>
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->

  </footer>
  <!-- Footer -->

  <!-- jQuery and Bootstrap JS -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Template JavaScript -->

  <!-- stats number counter-->
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.countup.js"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->


  <!-- testimonials owlcarousel -->
  <script src="assets/js/owl.carousel.js"></script>

  <!-- script for owlcarousel -->
  <script>
    $(document).ready(function() {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: false
          },
          1000: {
            items: 1,
            nav: false
          }
        }
      })
    })
  </script>
  <!-- //script for owlcarousel -->
  <!-- //testimonials owlcarousel -->

  <!-- script for courses -->
  <script>
    $(document).ready(function() {
      $('.owl-two').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 2,
            nav: false
          },
          1000: {
            items: 3,
            nav: false
          }
        }
      })
    })
  </script>
  <!-- //script for courses -->

  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function() {
      $('.navbar-toggler').click(function() {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->

</body>

</html>
<!-- footer -->
<footer class="w3l-footer-29-main" id="footer">
  <div class="footer-29 py-5">
    <div class="container pb-lg-3">
      <div class="row footer-top-29">
        <div class="col-lg-6 col-md-6 footer-list-29 footer-1 mt-md-4">
          <a class="footer-logo mb-md-3 mb-2" href="#"><i class="fa fa-shield" aria-hidden="true"></i> CyberBooks</a>
          <p>Welcome to your new digital library! Whether you're a lifelong learner, a voracious reader, or a student in need of reliable references, we've got something for you. </p>
        </div>


        <div class="col-lg-6 col-md-6 footer-list-29 footer-4 mt-5">
          <h6 class="footer-title-29">Quick Links</h6>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="footers14-block" class="py-3">
    <div class="container">
      <div class="footers14-bottom text-center">
        <div class="copyright mt-1">
          <p>&copy; 2024 Digital Library. All Rights Reserved</p>
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
<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Template JavaScript -->

<!-- stats number counter-->
<script src="../assets/js/jquery.waypoints.min.js"></script>
<script src="../assets/js/jquery.countup.js"></script>
<script>
  $('.counter').countUp();
</script>
<!-- //stats number counter -->


<!-- testimonials owlcarousel -->
<script src="../assets/js/owl.carousel.js"></script>

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
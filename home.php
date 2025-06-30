<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Your Blog Title : Homepage</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
  <!-- Slick Carousel CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style[1].css"/>

  <style>
    body {
  margin: 0;
  font-family: Arial, sans-serif;
  background-color: #000; /* optional for entire background */
  color: #fff;
}
    nav {
      position: relative;
    }

    .menu-toggle {
      display: none;
      cursor: pointer;
      font-size: 24px;
    }

    .nav {
      list-style: none;
      display: flex;
      gap: 20px;
      align-items: center;
      margin: 0;
      padding: 0;
    }

    .nav li {
      position: relative;
      
    }

    .nav li ul {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: black;
      list-style: none;
      padding: 10px 0;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .nav li:hover ul {
      display: block;
    }

    .nav li ul li {
      padding: 5px 20px;
      white-space: nowrap;
    }

    .logo img {
      
      width: 100px;
      height: auto;
    }

    @media (max-width: 768px) {
      .menu-toggle {
        display: block;
      }

      .nav {
        flex-direction: column;
        display: none;
        background: #000;
        position: absolute;
        width: 100%;
        left: 0;
        top: 60px;
        z-index: 1000;
      }

      .nav.active {
        display: flex;
      }

      .nav li {
        width: 100%;
        text-align: left;
        padding: 10px;
      }

      .nav li ul {
        position: static;
        box-shadow: none;
      }
    }

    .video-section, .cta {
      text-align: center;
      margin: 30px 0;
    }

    .upload-btn, .cta a {
      text-decoration: none;
      padding: 10px 20px;
      background:rgb(255, 174, 0);
      color: #fff;
      border-radius: 5px;
      display: inline-block;
    }
  </style>
</head>

<body>
  <header>
    <div class="logo">
  <img src="images/logo.jpg" alt="FussionHub" />
</div>

    <i class="fa fa-bars menu-toggle"></i>
    <nav>
      <ul class="nav">
        <li><a href="view_post/view_post.php">View Post</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
      </ul>
    </nav>
  </header>

  <!-- Video Section -->
  <section class="video-section">
    <a href="view_post/video/video.php" class="upload-btn">🎥 Watch / Upload Video</a>
  </section>

  <!-- CTA Section -->
  <div class="cta">
    <a href="create_post/create-post.php">✍ Create a Post</a>
  <div style="text-align: center;">
  <img src="images/logo.jpg" alt="FussionHub" />
</div>
  </div>


  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- Slick Carousel -->
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- JavaScript -->
  <script>
    $(document).ready(function () {
      $('.menu-toggle').on('click', function () {
        $('.nav').toggleClass('active');
      });

      $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
        responsive: [
          {
            breakpoint: 1024,
            settings: { slidesToShow: 2 }
          },
          {
            breakpoint: 600,
            settings: { slidesToShow: 1 }
          }
        ]
      });
    });
  </script>
</body>
</html>

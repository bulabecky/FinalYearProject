<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Cosán Ceol</title>

    <!-- Bootstrap Core CSS -->
    <link href="css1/bootstrap1.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css1/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
      
      <link rel="stylesheet" type="text/css" href="comment_style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script src="testAjax.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
        width: 100%;
      }
    </style>
  </head>

  <body onload="load()">
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>Menu </a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>About</a>
            </li>
            <li>
                <a href="login/login.php" onclick=$("#menu-close").click();>Log In</a>
            </li>
            <li>
                <a href="login/registration.php" onclick=$("#menu-close").click();>Sign Up</a>
            </li>
            <li>
                <a href="#map" onclick=$("#menu-close").click();>Search the Map</a>
            </li>
            <li>
                <a href="#comment-section" onclick=$("#menu-close").click();>Leave a Comment</a>
            </li>
            <li>
                <a href="#bottom" onclick=$("#menu-close").click();>Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1 id="heading">Cosán Ceol</h1>
            <h3>Journey through Irish Music</h3>
            <br>
            <a href="#map" class="btn btn-dark btn-lg">Start Searching</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 id="heading">Cosán Ceol</h2>
                    <p class="lead">Cosán ceol is an interactive map application highlighting Irish Music.<br>
                    This website has been created for the requirements of a Final Year Project By Rebecca McGowan.</p>
                    <img src="Images/newLogo.png">
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <section id="SignIn">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="login/login.php" class="btn btn-lg btn-dark">Log In</a>
                    <a href="login/registration.php" class="btn btn-lg btn-dark">Register Me!</a>
                </div>
            </div>
        </section>
    <div id="map"style="float: right;">
      </div>
      <form action="#">
      <input type="checkbox" id="Festivalbox" onclick="boxclick(this,'Festival')" checked/>
      <label>Festival</label>
      <input type="checkbox" id="Bandbox" onclick="boxclick(this,'Band')" checked/>
      <label>Band</label>
      <input type="checkbox" id="Fiddlebox" onclick="boxclick(this,'Fiddle')" checked/>
      <label>Fiddle</label>
      <input type="checkbox" id="Banjobox" onclick="boxclick(this,'Banjo')" checked/>
      <label>Banjo</label>
      <input type="checkbox" id="Singerbox" onclick="boxclick(this,'Singer')" checked/>
      <label>Singer</label>
      <input type="checkbox" id="Guitaristbox" onclick="boxclick(this,'Guitarist')" checked/>
      <label>Guitarist</label>
      <input type="checkbox" id="Uilleannbox" onclick="boxclick(this,'Uilleann')" checked/>
      <label>Uilleann</label>
       <input type="checkbox" id="FolkBandbox" onclick="boxclick(this,'FolkBand')" checked/>
      <label>Folk Band</label>
       <input type="checkbox" id="TinWhistlebox" onclick="boxclick(this,'TinWhistle')" checked/>
      <label>Tin Whistle</label>
      </form>
     
      <div class="col-lg-12 text-center"> 
      <a href="festival.php" class="btn btn-lg btn-dark">Festival Map</a>
      </div>
          </div>


        <script type="text/javascript">
    //<![CDATA[

//set up globals
var gmarkers = [];
var infoWindow = [];

//set up icons
var customIcons = {
 FolkBand: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/orange-dot.png'
               },
                Festival: {
                  icon: 'http://maps.google.com/mapfiles/ms/micons/red-dot.png'
                },
                Fiddle: {
                  icon: 'http://maps.google.com/mapfiles/ms/micons/blue-dot.png'
                },
                Banjo: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/green-dot.png'
                },

                Singer: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/yellow-dot.png'
               },

               Guitarist: {
                icon: 'http://maps.google.com/mapfiles/ms/micons/ltblue-dot.png'
               },

               Uilleann : {
                icon: 'http://maps.google.com/mapfiles/ms/micons/pink-dot.png'
               },

               TinWhistle : {
                icon: 'http://maps.google.com/mapfiles/marker_white.png'
               },

                Band: {
                  icon: 'http://maps.google.com/mapfiles/ms/micons/purple-dot.png'
                }
             };

//load function
function load() {

//initialise map
var map = new google.maps.Map(document.getElementById("map"), {
center: new google.maps.LatLng(53.350140, -6.266155),
zoom: 7
});
var infoWindow = new google.maps.InfoWindow;
//ok



//set up pins from xmlgen.php file
  // Change this depending on the name of your PHP file
downloadUrl("http://cosanceol.tk/mapDBXML.php", function(data) {
  var xml = data.responseXML;
  var markers = xml.documentElement.getElementsByTagName("marker");
  for (var i = 0; i < markers.length; i++) {
    var name = markers[i].getAttribute("name");
    var address = markers[i].getAttribute("address");
    var video = markers[i].getAttribute("video");
    var type = markers[i].getAttribute("type");
    var point = new google.maps.LatLng(
        parseFloat(markers[i].getAttribute("lat")),
        parseFloat(markers[i].getAttribute("lng")));
    var infowincontent = document.createElement('div');
                      var strong = document.createElement('strong');
                      strong.textContent = name
                      infowincontent.appendChild(strong);
                      infowincontent.appendChild(document.createElement('br'));

                      var text = document.createElement('text');
                      text.textContent = address
                      infowincontent.appendChild(text);
                      infowincontent.appendChild(document.createElement('br'));
                      var x = document.createElement("IFRAME");
                      x.setAttribute("src", video);
                      infowincontent.appendChild(x);
    var icon = customIcons[type] || {};

    var marker = new google.maps.Marker({
      map: map,
      position: point,
      icon: icon.icon
    });
    marker.mycategory = type;
    gmarkers.push(marker);

    bindInfoWindow(marker, map, infoWindow, infowincontent);
}
  });
}

    function bindInfoWindow(marker, map, infoWindow, infowincontent) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}


// == shows all markers of a particular category, and ensures the checkbox is checked ==
 function show(category) {
   for (var i=0; i<gmarkers.length; i++) {
     if (gmarkers[i].mycategory == category) {
       gmarkers[i].setVisible(true);
     }
   }
   // == check the checkbox ==
   document.getElementById(category+"box").checked = true;
 }

 // == hides all markers of a particular category, and ensures the checkbox is cleared ==
 function hide(category) {
   for (var i=0; i<gmarkers.length; i++) {
     if (gmarkers[i].mycategory == category) {
       gmarkers[i].setVisible(false);
     }
   }
   // == clear the checkbox ==
   document.getElementById(category+"box").checked = false;
   // == close the info window, in case its open on a marker that we just hid
   infoWindow.close();
 }

 // == a checkbox has been clicked ==
      function boxclick(box,category) {
        if (box.checked) {
          show(category);
        } else {
          hide(category);
        }
      }

    //]]>

  </script>
    <div class="col-lg-12 text-center">    
      <div id="comment-section">
          <h4>Leave a comment</h4>

  <form method="post" action="" onsubmit="return post();">
  <textarea id="comment" placeholder="To leave a comment, you need to login or Sign up."></textarea>
  <br>
  <input type="text" id="username" value="Sign in please" readonly>
  <br>
  <input type="submit" value="Post Comment">
  </form>

  <div id="all_comments">
  <?php
    $con = mysqli_connect("localhost","root","Beckyboo4","register");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }


    $result = mysqli_query($con,'SELECT name, comment, post_time FROM comments order by post_time desc');
    if (!$result) {
        die('Could not query:' . mysqli_error());
    }

   while ($row = mysqli_fetch_row($result)) {
      $name = $row[0];
      $comment = $row[1];
      $datetime = $row[2];
      
      ?>

      <div class="comment_div"> 
        <p class="name">Posted By: <?php echo $name;?></p>
          <p class="comment"><?php echo $comment;?></p> 
        <p class="time"><?php echo $datetime;?></p>
      </div>
    <?php
    }

    mysqli_close($con) or die(mysqli_error());
    ?>
  </div>

     <footer id="bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Cosán Ceol</strong>
                    </h4>
                    <p>Maynooth Univerisity
                        <br>Maynooth
                        <br>Co Kildare
                        <br>Ireland</p>
                    <ul class="list-unstyled">
                        
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:cosanceol@gmail.com">cosanceol@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <div id="fb-root"></div>
                              <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
                                fjs.parentNode.insertBefore(js, fjs);
                              }(document, 'script', 'facebook-jssdk'));</script>
                              <div class="fb-share-button" data-href="http://cosanceol.tk/" data-layout="fa fa-facebook fa-fw fa-3x" data-mobile-iframe="true"><a class="fa fa-facebook fa-fw fa-3x" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fcosanceol.tk%2F&amp;src=sdkpreparse"></a></div>
                        </li>
                         <li>
                            <a href="https://twitter.com/intent/tweet?text=Look%20at%20my%20map%20on%20CosánCeol!- 'http://cosanceol.tk/'"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                            <script>window.twttr = (function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0],
                                t = window.twttr || {};
                              if (d.getElementById(id)) return t;
                              js = d.createElement(s);
                              js.id = id;
                              js.src = "https://platform.twitter.com/widgets.js";
                              fjs.parentNode.insertBefore(js, fjs);

                              t._e = [];
                              t.ready = function(f) {
                                t._e.push(f);
                              };

                              return t;
                            }(document, "script", "twitter-wjs"));</script>
                            <div class="twittwe-share-button" data-href="http://cosanceol.tk/"></div>
                        </li>
                    </ul>
                    <hr class="small">
                    <p>Copyright &copy; cosanceol.tk 2017</p>
                </div>
            </div>
       
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
      // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJXSQg6uRk9OD-fGID7NQ52sXpufXz268&callback=initMap">
    </script>

  </body>
</html>
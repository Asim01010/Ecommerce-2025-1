  <style>
      .caret-up {
          width: 0;
          height: 0;
          border-left: 4px solid rgba(0, 0, 0, 0);
          border-right: 4px solid rgba(0, 0, 0, 0);
          border-bottom: 4px solid;

          display: inline-block;
          margin-left: 2px;
          vertical-align: middle;
      }
  </style>
  <script>
      $(function() {
          $(".dropdown").hover(
              function() {
                  $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                  $(this).toggleClass('open');
                  $('b', this).toggleClass("caret caret-up");
              },
              function() {
                  $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                  $(this).toggleClass('open');
                  $('b', this).toggleClass("caret caret-up");
              });
      });
  </script>
  <nav class="NavBarColor">


      <nav class="navbar-inverse">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
          </div>
      </nav>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

              <li><a href="index.php?view=home">Home</a></li>



          </ul>
      </div><!-- /.navbar-collapse -->


  </nav>
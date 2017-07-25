

    <!-- jQuery -->
    <script src="<?php echo THEME; ?>modern-business/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo THEME; ?>modern-business/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    $('#nav').affix({
      offset: {
        top: $('header').height()
      }
    });
    $('#sidebar').affix({
      offset: {
        top: 200
      }
    });
    </script>

</body>

</html>
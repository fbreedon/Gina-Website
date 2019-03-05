<!DOCTYPE html>
<html>

  <head>
  	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="keywords" content="Gina Werfel, Prince Street Gallery, Artist">
    <link rel="icon" href="./images/Galaxy Favicon.jpg" type="image/jpg">
    <link rel="shortcut icon" href="./images/Galaxy Favicon.jpg" type="image/jpg">
    <link rel="apple-touch-icon" href="./images/Galaxy Favicon.jpg" type="image/jpg">
    <meta property="og:image:url" content="http://ginawerfel.com/images/Galaxy-FB-Favicon.jpg">
    <meta property="og:image:width" content="1080">
    <meta property="og:image:height" content="1080">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://ginawerfel.com/archive.php">
    <meta property="og:title" content="Archive | Gina Werfel">
    <meta property="og:description" content="Gina Werfel is an artist whose painterly abstract paintings derive from moving and interacting with her surroundings.">
    <meta property="fb:app_id" content="506666969839633">
  	<title>Archive | Gina Werfel</title>
  </head>

  <body>

    <header class="header">
      <a class="title" href="/">Gina Werfel</a>
      <div class="container">
      	<nav class="navigation">
      	  <a href="./painting.php">Paintings</a>
      	  <a href="./paper.php">Works On Paper</a>
      	  <a href="./public-art.html">Special Projects</a>
      	  <a href="./archive.php" class="active">Archive</a>
          <!--a href="./reviews.html">Publications</a-->
      	  <a href="./news.html">Press</a>
      	  <a href="./about.html">About</a>
      	</nav>
      </div>
    </header>

    <!-- Archive wrapper pads the margins from the header and footer, differently from content wrapper -->
    <div class="archive-wrapper">
      <!-- **REMOVED Archive tabs to view either abstractions or landscapes REMOVED** -->
      <!--div class="archive-tab"-->
        <!-- **REMOVED The tab link class is gotten by the archive tab script REMOVED** -->
        <!--a class="tab-link" onclick="openTab(event, 'Abstractions')" id="default-tab">Abstractions</a-->
        <!--a class="tab-link" onclick="openTab(event, 'Landscapes')">Landscapes</a-->
      <!--/div-->
      <h2>Abstraction</h2>
      <!-- Abstractions archive image grid -->
      <div id="Abstractions" class="archive-grid tab-content">
        <!-- Php to read the image files and display them in the archive grid -->
        <?php
        // Define a count for the onclick function
        $count = 1;
        // Find all the image file paths in the directory and store them in an array,
        // then display each one properly in the grid as a clickable image
        foreach (glob("images/archive/abstractions/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $img_file) {
        ?>
          <img class="archive-img" onclick="openModal();currentModal(<?php echo $count ?>)" 
               src="<?php echo $img_file; ?>" />
          <?php
          // Increment the count
          $count++;
        }
        ?>
      </div>

      <h2>Landscape</h2>
      <!-- Landscape archive image grid -->
      <div id="Landscapes" class="archive-grid tab-content">
        <!-- Php to read the image files and display them in the archive grid -->
        <?php
        // Do the same as above, but for images in landscapes
        foreach (glob("images/archive/landscapes/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $img_file) {
        ?>
          <img class="archive-img" onclick="openModal();currentModal(<?php echo $count ?>)" 
               src="<?php echo $img_file; ?>" />
          <?php
          // Increment the count
          $count++;
        }
        ?>
      </div>
    </div>

    <!-- Archive container for the pop-up modal -->
    <!-- Click an image in the archive to open an overlay with a bigger image -->
    <div id="modal" class="archive-modal">
      <!-- X in the top right corner to close the modal -->
      <span class="modal-close" onclick="closeModal()">&times;</span>
      <!-- Modal navigation by clicking to the right or left of images -->
      <a class="prev-img" onclick="plusModal(-1)"></a>
      <a class="next-img" onclick="plusModal(1)"></a>
      <div class="modal-content">
        <!-- Abstraction modal images -->
        <!-- Php to read the image files and display them in the modal -->
        <?php
        // Find all the image file paths in the directory and store them in an array,
        // then display each one properly in the modal
        foreach (glob("images/archive/abstractions/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $img_file) {
        ?>
          <img class="modal-img" src="<?php echo $img_file; ?>" />
          <?php
        }
        ?>

        <!-- Landscape modal images -->
        <!-- Php to read the image files and display them in the modal -->
        <?php
        // Do the same as above, but for images in landscapes, and with a wide styling
        foreach (glob("images/archive/landscapes/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $img_file) {
        ?>
          <img class="modal-img wide" src="<?php echo $img_file; ?>" />
          <?php
        }
        ?>
        
        <!-- Gallery container for the image information -->
        <div class="gallery-info">
          <!-- Abstraction image caption information -->
          <!-- Php to read the info files and display them under their images -->
          <?php
          // Find all the text file paths in the directory and store them in an array
          foreach (glob("images/archive/abstractions/info/*.txt") as $info_file) {
            // Open and read the current file in the array
            $file_handle = fopen($info_file, "r");
          ?>
            <!-- Archive modal image information -->
            <div class="info">
              <?php
              // Read the file line by line and put them all in one div
              while (!feof($file_handle)) { echo fgets($file_handle); ?> <br> <?php }
              ?>
            </div>
            <?php
            // Close the opened file
            fclose($file_handle);
          }
          ?>

          <!-- Landscape image caption information -->
          <!-- Php to read the info files and display them under their images -->
          <?php
          // Find all the text file paths in the directory and store them in an array
          foreach (glob("images/archive/landscapes/info/*.txt") as $info_file) {
            // Open and read the current file in the array
            $file_handle = fopen($info_file, "r");
          ?>
            <!-- Archive modal image information -->
            <div class="info">
              <?php
              // Read the file line by line and put them all in one div
              while (!feof($file_handle)) { echo fgets($file_handle); ?> <br> <?php }
              ?>
            </div>
            <?php
            // Close the opened file
            fclose($file_handle);
          }
          ?>
        </div>
      </div>
    </div>

    <!-- **REMOVED Call the archive tab script REMOVED** -->
    <!--script src="archive tab script.js"></script-->

    <!-- Call the archive modal script -->
    <script src="archive modal script.js"></script>

    <!-- Page footer for copyright and social media info -->
    <footer class="footer">
      <div class="footer-left">
        <p>&copy Gina Werfel</p>
      </div>
    </footer>

  </body>

</html>
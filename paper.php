<!DOCTYPE html>
<html>

  <head>
  	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  	<title>Works on Paper | Gina Werfel</title>
  </head>

  <body>

    <header class="header">
      <a class="title" href="/">Gina Werfel</a>
      <div class="container">
      	<nav class="navigation">
      	  <a href="./painting.php">Paintings</a>
      	  <a href="./paper.php" class="active">Works On Paper</a>
      	  <a href="./public art.html">Special Projects</a>
      	  <a href="./archive.php">Archive</a>
          <!--a href="./reviews.html">Publications</a-->
      	  <a href="./news.html">Press</a>
      	  <a href="./about.html">About</a>
      	</nav>
      </div>
    </header>

    <!-- Content wrapper pads the margins from the header and footer -->
    <div class="content-wrapper">
      <!-- Gallery container -->
      <div class="gallery">
        <!-- Gallery navigation by clicking to the right or left of images -->
        <a class="prev-img" onclick="plusImg(-1)"></a>
        <a class="next-img" onclick="plusImg(1)"></a>
        <!-- Gallery container for images -->
        <div class="gallery-main">
          <!-- Php to read the image files and display them in the gallery -->
          <?php
          // Find all the image file paths in the directory and store them in an array,
          // then display each one properly in the gallery as a clickable image
          foreach (glob("images/works on paper/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $img_file) {
          ?>
            <a href="<?php echo $img_file; ?>">
              <img class="gallery-img" src="<?php echo $img_file; ?>" />
            </a>
            <?php
          }
          // Do the same as above, but for the wide images, and add a styled wide class
          foreach (glob("images/works on paper/wide/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $img_file) {
          ?>
            <a href="<?php echo $img_file; ?>">
              <img class="gallery-img wide" src="<?php echo $img_file; ?>" />
            </a>
            <?php
          }
          ?>
        </div>

        <!-- Gallery container for the image information -->
        <div class="gallery-info">
        <!-- Php to read the info files and display them under their images -->
          <?php
          // Find all the text file paths in the directory and store them in an array
          foreach (glob("images/works on paper/info/*.txt") as $info_file) {
            // Open and read the current file in the array
            $file_handle = fopen($info_file, "r");
          ?>
            <!-- Gallery image information -->
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

          // Find all the text file paths in the wide directory and store them in an array
          foreach (glob("images/works on paper/wide/info/*.txt") as $info_file) {
            // Open and read the current file in the array
            $file_handle = fopen($info_file, "r");
          ?>
            <!-- Gallery image information -->
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
        
        <!-- Gallery container for the bottom navigation-->
        <!-- Click an image to jump to it, use overflow to scroll through them -->
        <div class="gallery-nav">
          <!-- Gallery container for the main buttons that go to the next image -->
          <div class="gallery-buttons">
            <a class="prev-button" onclick="plusImg(-1)">❮</a>
            <a class="next-button" onclick="plusImg(1)">❯</a>
          </div>
          <!-- Php to read the icon files and display them in the nav bar -->
          <?php
          // Define a count for the onclick function
          $count = 1;
          // Find all the icon file paths in the directory and store them in an array,
          // then display each one properly in the nav bar with an onclick function
          foreach (glob("images/works on paper/icons/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $icon_file) {
          ?>
            <img class="gallery-icon" 
                 onclick="currentImg(<?php echo $count ?>)" 
                 src="<?php echo $icon_file; ?>" />
            <?php
            // Increment the count
            $count++;
          }
          // Do the same as above, but for the wide icons
          foreach (glob("images/works on paper/wide/icons/*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE) as $icon_file) {
          ?>
            <img class="gallery-icon" 
                 onclick="currentImg(<?php echo $count ?>)" 
                 src="<?php echo $icon_file; ?>" />
            <?php
            // Increment the count
            $count++;
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Call the gallery script -->
    <script src="gallery script.js"></script>

    <!-- Page footer for copyright and social media info -->
    <footer class="footer">
      <div class="footer-left">
        <p>&copy Gina Werfel</p>
      </div>
    </footer>

  </body>

</html>
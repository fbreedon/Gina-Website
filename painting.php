<!DOCTYPE html>
<html>

  <head>
  	<meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  	<title>Painting | Gina Werfel</title>
  </head>

  <body>

    <header class="header">
      <a class="title" href="./index.html">Gina Werfel</a>
      <div class="container">
      	<nav class="navigation">
      	  <a href="./painting.php" class="active">Painting</a>
      	  <a href="./paper.html">Works On Paper</a>
      	  <a href="./public art.html">Public Art</a>
      	  <a href="./archive.html">Archive</a>
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
          // Define the path to the image directory
          $img_path = 'images/paintings/';
          // Get all the files that are images
          $num_img_files = glob($img_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
          // Open the image folder and store it in a variable
          $img_folder = opendir($img_path);

          // Make sure there were files to grab
          if($num_img_files > 0) {
            // Read each file until there are no more files
            while(false !== ($img_file = readdir($img_folder))) {
              // Define the path to the current file
              $img_file_path = $img_path.$img_file;
              // Convert the extension string of the file to lowercase
              $img_extension = strtolower(pathinfo($img_file ,PATHINFO_EXTENSION));
              // Make sure the file is an image
              if($img_extension=='jpg' || $img_extension =='png' || 
                 $img_extension == 'gif' || $img_extension == 'bmp') {
          ?>
                <a href="<?php echo $img_file_path; ?>">
                  <img class="gallery-img" src="<?php echo $img_file_path; ?>" />
                </a>
                <?php
              }
            }   // Done with the current file
          }     // Done with all the files
          // There were no matching files
          else {
            echo "No Images Found";
          }
          // Close the opened directory
          closedir($img_folder);
          ?>
        </div>

        <!-- Gallery container for the image information -->
        <div class="gallery-info">
        <!-- Php to read the info files and display them under their images -->
          <?php
          // Grab all the text files from the directory and store them in an array
          foreach (glob("images/paintings/info/*.txt") as $info_file) {
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
          // Define the path to the icon directory
          $icon_path = 'images/paintings/icons/';
          // Get all the files that are images
          $num_icon_files = glob($icon_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
          // Open the image folder and store it in a variable
          $icon_folder = opendir($icon_path);
          // Define a count for the onclick function
          $count = 1;

          // Make sure there were files to grab
          if($num_icon_files > 0) {
            // Read each file until there are no more files
            while(false !== ($icon_file = readdir($icon_folder))) {
              // Define the path to the current file
              $icon_file_path = $icon_path.$icon_file;
              // Convert the extension string of the file to lowercase
              $icon_extension = strtolower(pathinfo($icon_file ,PATHINFO_EXTENSION));
              // Make sure the file is an image
              if($icon_extension=='jpg' || $icon_extension =='png' || 
                 $icon_extension == 'gif' || $icon_extension == 'bmp') {
          ?>
                <img class="gallery-icon" 
                  onclick="currentImg(<?php echo $count ?>)" 
                  src="<?php echo $icon_file_path; ?>" />
                <?php
                // Increment the count
                $count++;
              }
            }   // Done with the current file
          }     // Done with all the files
          // There were no matching files
          else {
            echo "No Icons Found";
          }
          // Close the opened directory
          closedir($icon_folder);
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
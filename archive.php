<!DOCTYPE html>
<html>

  <head>
  	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  	<title>Archive | Gina Werfel</title>
  </head>

  <body>

    <header class="header">
      <a class="title" href="./index.html">Gina Werfel</a>
      <div class="container">
      	<nav class="navigation">
      	  <a href="./painting.html">Painting</a>
      	  <a href="./paper.html">Works On Paper</a>
      	  <a href="./public art.html">Public Art</a>
      	  <a href="./archive.html" class="active">Archive</a>
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
        // Define the path to the image directory
        $img_path = 'images/abstractions/';
        // Get all the files that are images
        $num_img_files = glob($img_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);
        // Open the image folder and store it in a variable
        $img_folder = opendir($img_path);
        // Define a count for the onclick function
        $count = 1;

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
              <img class="archive-img" onclick="openModal();currentModal(<?php echo $count ?>)" 
                src="<?php echo $img_file_path; ?>" />
              <?php
              // Increment the count
              $count++;
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

      <h2>Landscape</h2>
      <!-- Landscape archive image grid -->
      <div id="Landscapes" class="archive-grid tab-content">
        <!-- Php to read the image files and display them in the archive grid -->
        <?php
        // Define the path to the image directory
        $img_path = 'images/landscapes/';
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
              <img class="archive-img" onclick="openModal();currentModal(<?php echo $count ?>)" 
                src="<?php echo $img_file_path; ?>" />
              <?php
              // Increment the count
              $count++;
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
        // Define the path to the image directory
        $img_path = 'images/abstractions/';
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
              <img class="modal-img" src="<?php echo $img_file_path; ?>" />
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

        <!-- Landscape modal images -->
        <!-- Php to read the image files and display them in the modal -->
        <?php
        // Define the path to the image directory
        $img_path = 'images/landscapes/';
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
              <img class="modal-img" src="<?php echo $img_file_path; ?>" />
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
        
        <!-- Gallery container for the image information -->
        <div class="gallery-info">
          <!-- Abstraction image caption information -->
          <!-- Php to read the info files and display them under their images -->
          <?php
          // Grab all the text files from the directory and store them in an array
          foreach (glob("images/abstractions/info/*.txt") as $info_file) {
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
          // Grab all the text files from the directory and store them in an array
          foreach (glob("images/landscapes/info/*.txt") as $info_file) {
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
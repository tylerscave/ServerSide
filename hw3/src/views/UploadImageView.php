<?php
/**
 *COPYRIGHT (C) 2016 Tyler Jones. All Rights Reserved.
 * UploadImageView.php is the view for the upload an image screen
 * Solves CS174 Hw3
 * @author Tyler Jones
*/
namespace soloRider\hw3\views;
require_once "View.php";

class UploadImageView extends View {
    /**
     * Draw the web page to the browser
     */
    public function render($data) {
    ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Image Rating Upload</title>
                <link href="./src/resources/favicon.ico" rel="shortcut icon" type="image/x-icon" />
                <link rel="stylesheet" href="./src/styles/views.css" type="text/css"/>
                <meta charset="utf-8"/>
                <meta name="author" content="Tyler Jones"/>
                <meta name="description" content="Upload page for the Image Rating System"/>
            </head>
            <body>
                <h1 class="centered"><img src="./src/resources/logo.png" alt="Image Rating" /></h1>
                <form class="centered" id="fileUploadForm" enctype="multipart/form-data">
                    <label for="fileUpload">Select a File to Upload:</label>
                    <input id="fileUpload" type="file" name="imageFile"><br>
                    <label for="captionUpload">Add a caption to your image:</label>
                    <input id="captionUpload" type="text" name="imageCaption" maxlength="100"><br>
                    <input type="submit" name="upload" value="UPLOAD">
                </form>
                <div class="centered">
                    <?php
                    if(isset($data['UPLOADED_FILE'])) {
                    ?>
                        <p>The image you selected was: <?=$data['UPLOADED_FILE'] ?></p>
                    <?php
                    } else if(!empty($data['UPLOADED_FILE'])) {
                    ?>
                        <p>You did not select a valid file. Please try again.</p>
                    <?php
                    }
                    if(isset($data['UPLOADED_FILE_VALID']) && $data['UPLOADED_FILE_VALID'] == true) {
                    ?>
                        <p>The uploaded file is a valid JPEG file and was successfully uploaded!</p>
                    <?php
                    } else if(!empty($data['UPLOADED_FILE'])) {
                    ?>
                        <p>The uploaded file was not a valid JPEG file, please try again with a valid JPEG file.</p>
                    <?php
                    }
                    ?>
                    <br>
                    <form class="centered" method="post" action="index.php">
                        <label for="returnButton">Done uploading images?</label>
                        <input type="submit" id="returnButton" name="" value="Return">
                    </form>
                </div>
            </body>
        </html>
    <?php
    }
}

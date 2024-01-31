<?php

class Preview extends CI_Controller {

    function show_image($image_filename) {

       $img_path = base_url();'uploads/goods'.$image_filename;

       $fp = fopen($img_path,'rb');
          header('Content-Type: image/png');
          header('Content-length: ' . filesize($img_path));
         fpassthru($fp);
    }
}
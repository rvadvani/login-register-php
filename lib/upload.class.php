<?php 
/**
 * Created by www.coderseven.com
 * User: rvadvani | coder seven
 * Date: 30th March 2017
 * Time: 12:34 AM
 */
class UPLOAD {
        
        public function upload_file($prefix, $filename, $filepath, $compress, $type, $file_size) {
        function compress_image($source_url, $destination_url, $quality) {
            $info = getimagesize($source_url);
            if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
            else if ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
            else if ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
            //save it
            imagejpeg($image, $destination_url, $quality);
            //return destination file url
            return $destination_url;
        }
        if($type == 1) {
            $valid_formats = array("jpg", "png", "gif", "jpeg", "JPG", "PNG", "GIF", "JPEG");
        } else if($type == 2){
            $valid_formats = array("doc", "docx", "xls", "ppt", "pptx", "pdf");
        } else if($type == 3) {
            $valid_formats = array("mp4");
        }

        $max_file_size = (1024 * $file_size * 1000); // 1024*2000; 2mb
        $picture = $_FILES[$filename]['name'];
        $picture_path = $filepath;
        $append = date('dmYhis'); //appending some timestamp string to file
        if(!empty($picture)) {
            if ($_FILES[$filename]['error'] == 4) {
                return 400; //error in file
            }
            if ($_FILES[$filename]['error'] == 0) {
                if ($_FILES[$filename]['size'] > $max_file_size) {
                    return 302; //large file more then 2MB
                }
                else if (!in_array(pathinfo($picture, PATHINFO_EXTENSION), $valid_formats)) {
                    return 303; // invalid format
                } else {
                    $temp = explode(".", $picture);
                    $picture = $prefix . $append . '_' . round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES[$filename]['tmp_name'], $picture_path . $picture);
                    $source_photo = $picture_path.$picture;
                    $dest_photo = $picture_path.$picture;
                    compress_image($source_photo, $dest_photo, $compress);
                    return $picture;
                }
            }
        }
    }

    public function upload_mfile($prefix, $filename, $filepath, $compress, $type, $file_size) {
        function compress_image($source_url, $destination_url, $quality) {
            $info = getimagesize($source_url);
            if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
            else if ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
            else if ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
            //save it
            imagejpeg($image, $destination_url, $quality);
            //return destination file url
            return $destination_url;
        }
        if($type == 1) {
            $valid_formats = array("jpg", "png", "gif", "jpeg", "JPG", "PNG", "GIF", "JPEG");
        } else if($type == 2){
            $valid_formats = array("doc", "docx", "xls", "ppt", "pptx", "pdf");
        } else if($type == 3) {
            $valid_formats = array("mp4");
        }

        $max_file_size = (1024 * $file_size * 1000); // 1024*2000; 2mb
        $picture = $_FILES[$filename]['name'];
        $picture_path = $filepath;
        $append = date('dmYhis'); //appending some timestamp string to file
        $count_picture = count($picture);
      
        $store_picture = array();
        for ($pic=0; $pic < $count_picture; $pic++)
        {
            if(!empty($picture[$pic])) {
                if ($_FILES[$filename]['error'][$pic] == 4) {
                    return 400; //error in file
                }
                if ($_FILES[$filename]['error'][$pic] == 0) {
                    if ($_FILES[$filename]['size'][$pic] > $max_file_size) {
                        return 302; //large file more then 2MB
                    }
                    else if (!in_array(pathinfo($_FILES[$filename]['name'][$pic], PATHINFO_EXTENSION), $valid_formats)) {
                        return 303; // invalid format
                    } else {
                        $temp = explode(".", $picture[$pic]);
                        $picture = $prefix . $append . $pic . '_' . round(microtime(true)) . '.' . end($temp);
                        move_uploaded_file($_FILES[$filename]['tmp_name'][$pic], $picture_path . $picture);
                        $source_photo = $picture_path.$picture;
                        $dest_photo = $picture_path.$picture;
                        compress_image($source_photo, $dest_photo, $compress);
                        array_push($store_picture, $picture);
                    }
                }
            }
        }
        return serialize($store_picture);
    } 

} ?>
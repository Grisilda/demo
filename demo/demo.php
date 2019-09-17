<?php 
// ."/".date("d")."/".date("m")."/".date("Y")

//Menyra me Unzip
// Get Project path

// Unzip selected zip file
 //Menyra e sakte e unzip te zip
if($_FILES["fileUpload"]["name"]) {
  $dt=date('H:i:s');
  $date   = new DateTime();
  $result = $date->format('Y-m-d');
  $krr    = explode('-', $result);
  $result = implode("_", $krr);
  $dt2    = explode(':', $dt);
  $result2 = implode("_", $dt2);
  //marrim emrin e file 
  $filename = $_FILES["fileUpload"]["name"];
  $source = $_FILES["fileUpload"]["tmp_name"];
  $type = $_FILES["fileUpload"]["type"];
  
  $name = explode(".", $filename);
  $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
  foreach($accepted_types as $mime_type) {
    if($mime_type == $type) {
      $okay = true;
      break;
    } 
  }
  echo $name[0];
  echo $name[1];
  if($name[1]=='zip'){
    echo "You are OK";
  }
  else {
    echo "It should be a zip file.";
    die;
  }
  // if($continue==false) {
  //   $message = "The file you are trying to upload is not a .zip file. Please try again.";
  // }
   // $count=0;
   // echo $count;
   $storagename = "zip_file".'_'.$result.'_'.$result2.".zip";
   $storagename2 = "zip_file".'_'.$result.'_'.$result2.".zip";
   // $count ++;
  $target_path ="unzip_photos/".$storagename;  
  // copy($source, "unzip/".$storagename2);
  if(move_uploaded_file($source,$target_path )) {
    copy("unzip_photos/".$storagename, "upload/".$storagename2);
     echo "Success";
    $zip = new ZipArchive();
    $x = $zip->open("unzip_photos/".$storagename);
    if ($x === true) {
      $zip->extractTo( $_SERVER['DOCUMENT_ROOT']. "/demo/unzip_photos/");
      $zip->close();
  
      unlink($target_path);
    }
     echo  "Your .zip file was uploaded and unpacked.";
  } 
  else {  
    echo "There was a problem with the upload. Please try again.";
  }
}
//Mbarim

//Menyra me Zip

// if ($_FILES && $_FILES['fileUpload']) {
    
//     if (!empty($_FILES['fileUpload']['name'][0])) {
        
//         $zip = new ZipArchive();
//         $zip_name = $_SERVER['DOCUMENT_ROOT']. "/demo/photo_uploads/" . time() . ".zip";
        
//         // Create a zip target
//         if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
//             $error .= "Sorry ZIP creation is not working currently.<br/>";
//         }
//        echo $zip_name;
//         $imageCount = count($_FILES['fileUpload']['name']);
//         echo json_encode($_FILES['fileUpload']['name']);
//         for($i=0;$i<$imageCount;$i++) {
        
//             if ($_FILES['fileUpload']['tmp_name'][$i] == '') {
//                 continue;
//             }
//             $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
            
//             // Moving files to zip.
//             $zip->addFromString($_FILES['fileUpload']['name'][$i], file_get_contents($_FILES['fileUpload']['tmp_name'][$i]));
            
//             // moving files to the target folder.
//             // move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT']. "/demo/photo_uploads/" . $newname);
//         }
//         $zip->close();
        
//         // Create HTML Link option to download zip
//         $success = basename($zip_name);
//     } else {
//         $error = '<strong>Error!! </strong> Please select a file.';
//     }
// }
// UPLOAD PHOTO
// print date('H:i');
// $target_dir = $_SERVER['DOCUMENT_ROOT']. "/demo/photo_uploads/";
// if( isset($_FILES['fileUpload']['name'])) {
      
//   $total_files = count($_FILES['fileUpload']['name']);
  
//   for($key = 0; $key < $total_files; $key++) {
//     echo $_FILES['fileUpload']['name'][$key];
//     // Check if file is selected
//     if(isset($_FILES['fileUpload']['name'][$key]) 
//                       && $_FILES['fileUpload']['size'][$key] > 0) {
      
//       $original_filename = $_FILES['fileUpload']['name'][$key];
//       $target = $target_dir . basename($original_filename);
//       $tmp  = $_FILES['fileUpload']['tmp_name'][$key];
//       move_uploaded_file($tmp, $target);
//     }
    
//   }
     
// }
//UPLOAD FILE
// $target = $_SERVER['DOCUMENT_ROOT']. "/demo/file_uploads/";
// if( isset($_FILES['fileUpload2']['name'])) {
      
//   $total = count($_FILES['fileUpload2']['name']);
  
//   for($key2 = 0; $key2 < $total; $key2++) {
//     echo $_FILES['fileUpload2']['name'][$key2];
//     // Check if file is selected
//     if(isset($_FILES['fileUpload2']['name'][$key2]) 
//                       && $_FILES['fileUpload2']['size'][$key2] > 0) {
      
//       $original = $_FILES['fileUpload2']['name'][$key2];
//       $final_target = $target . basename($original);
//       $tmp2  = $_FILES['fileUpload2']['tmp_name'][$key2];
//       move_uploaded_file($tmp2, $final_target);
//     }
    
//   }
     
// }
//Menyre tjeter e marjes me zip te fotove
// function recursive_dir($dir) {
// foreach(scandir($dir) as $file) {
// if ('.' === $file || '..' === $file) continue;
// if (is_dir("$dir/$file")) recursive_dir("$dir/$file");
// else unlink("$dir/$file");
// }
// rmdir($dir);
// }

// if($_FILES["fileUpload"]["name"]) {
// $filename = $_FILES["fileUpload"]["name"];
// $source = $_FILES["fileUpload"]["tmp_name"];
// $type = $_FILES["fileUpload"]["type"];

// $name = explode(".", $filename);
// $accepted_types = array('application/zip', 'application/x-zip-compressed', 
// 'multipart/x-zip', 'application/x-compressed');
// foreach($accepted_types as $mime_type) {
// if($mime_type == $type) {
// $okay = true;
// break;
// }
// }

// $continue = strtolower($name[1]) == 'zip' ? true : false;
// if(!$continue) {
// $myMsg = "Please upload a valid .zip file.";
// }

// /* PHP current path */
// $path = "unzip/";
// $filenoext = basename ($filename, '.zip'); 
// $filenoext = basename ($filenoext, '.ZIP');

// $myDir = $path . $filenoext; // target directory
// $myFile = $path . $filename; // target zip file

// if (is_dir($myDir)) recursive_dir ( $myDir);
// mkdir($myDir, 0777);

// if(move_uploaded_file($source, $myFile)) {
// $zip = new ZipArchive();
// $x = $zip->open($myFile); // open the zip file to extract
// if ($x === true) {
// $zip->extractTo($myDir); // place in the directory with same name
// $zip->close();
// unlink($myFile);
// }
// echo "Your .zip file uploaded and unziped.";
// } else { 
// echo "There was a problem with the upload.";
// }
// }
?>

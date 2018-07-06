<?php

$target_dir = $popupjb_jbloc . "/uploads/";

if ($_POST['preupload'] == "Yes ") {
   $target_file= $target_dir . $_POST['uploadedFile'];
   $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
   $filename = $_POST['uploadedFile'];
} elseif ($_POST['preupload'] == "No " ) {
   $filename = basename($_FILES["trackToUpload"]["name"]);
   $target_file= $target_dir . basename($_FILES["trackToUpload"]["name"]);
   $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
   if($fileType == "gff" || $fileType == "gff3" || $fileType == "bed" || $fileType == "gbk" || $fileType == "bam" || $fileType == "vcf") {
       move_uploaded_file($_FILES["trackToUpload"]["tmp_name"], $target_file);
       echo "The file ". basename( $_FILES["trackToUpload"]["name"]). " has been uploaded.<br>";
   } else {
       echo "There was a problem uploading your file.";
   }
}

$trackload = "test";

   if($fileType == "gff" || $fileType == "gff3" ) {
       if ($_POST['trackType'] == "gff") {
          $trackload = $popupjb_jbloc . '/bin/flatfile-to-json.pl --' . $_POST['trackType'] . ' ' . $target_file . ' --out ' . $popupjb_jbloc . '/' . $_POST['out'] . ' -trackLabel ' . $_POST['trackLabel'] . ' --trackType CanvasFeatures';
       } else {
          echo "Sorry, only *.gff or *.gff3 files are allowed for this function. <br>";
       }
   } else if($fileType == "bed") {
       if ($_POST['trackType'] == "bed") {
          $trackload = $popupjb_jbloc . '/bin/flatfile-to-json.pl --' . $_POST['trackType'] . ' ' . $target_file . ' --out ' . $popupjb_jbloc . '/' . $_POST['out'] . ' -trackLabel ' . $_POST['trackLabel'] . ' --trackType CanvasFeatures';
       } else {
          echo "Sorry, only *.bed files are allowed for this function. <br>";
       }
   } else if($fileType == "gbk") {
       if ($_POST['trackType'] == "gbk") {
           $trackload = $popupjb_jbloc . '/bin/flatfile-to-json.pl --' . $_POST['trackType'] . ' ' . $target_file . ' --out ' . $popupjb_jbloc . '/' . $_POST['out'] . ' -trackLabel ' . $_POST['trackLabel'] . ' --trackType CanvasFeatures';
       } else {
           echo "Sorry, only *.gbk files are allowed for this function. <br>";
       }
   } elseif ($fileType == "bam") {
       if ($_POST['trackType'] == "bam") {
           $trackload = $popupjb_jbloc . 'bin/bam-to-json.pl --trackLabel ' . $_POST['trackLabel'] . ' --bam ' . $target_file  . ' --out ' . $popupjb_jbloc . $_POST['out'];
       } else {
           echo "Sorry, only *.bam files are allowed for this function. <br>";
       }
   } elseif ($fileType == "vcf") {
       if ($_POST['trackType'] == "vcf") {
	      $root=$_SERVER['DOCUMENT_ROOT'];
              $trackload = 'bgzip ' . $target_file . '; tabix -p vcf ' . $target_file . '.gz; ' . $root . '/sites/all/modules/popupjb/vcf_fill.sh -l ' . $_POST['trackLabel'] . ' -f ' . $filename . ' -o ' . $popupjb_jbloc . $_POST['out'] . ' -p ' . $root;
       } else {
              echo "Sorry, only *.vcf files are allowed for this function. <br>";
       }
   } else {
        echo "Sorry, unrecognized file type.<br>";
   }


if ($trackload == "test") {
        echo "Error.  Please go back and review your input. <br> <br>";
} else {
    if ($_POST['out'] == "") {
        echo "Please go back and indicate the name of the reference you loaded. <br><br>";
    } else {

        exec($trackload);

        $url = '/' . $popupjb_jblocshort . '/index.html?data=' . $_POST['out'];
        echo "Success! To view the browser (with reference and new track loaded), go <a href='" .$url."'> here </a>.  <br \>";
}
}
        echo "To add tracks, please go <a href='/popupjb_track'> here </a>";

?>

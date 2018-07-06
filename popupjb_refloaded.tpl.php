<html>
</body>
<?php

//$test = $popupjb_jbloc;
$target_dir=$popupjb_jbloc . "uploads/";

if (basename($_FILES["fileToUpload"]["name"])=="") {
   $uploadOk = 0;
} else {
   $uploadOk = 1;
}

if ($_POST['preupload'] == "Yes ") {
   $target_file= $target_dir . $_POST['uploadedFile'];
} elseif ($_POST['preupload'] == "No " ) {
   $target_file= $target_dir . basename($_FILES["fileToUpload"]["name"]);
}
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

//echo $target_file;
//echo $_POST['preupload']; //Yes or No
//echo $_POST['uploadedFile']; //FILE name
//echo $_FILES["fileToUpload"]["tmp_name"];
//if (file_exists($target_file) || is_uploaded_file( $_FILES["fileToUpload"]["tmp_name"])) {

if (file_exists($target_file)) {
    echo "Your file was found preuploaded.";
    if($fileType == "fa" || $fileType == "fasta" ) {
       $url = '/' . $popupjb_jblocshort . '/index.html?data=' . $_POST['out'];
       echo "<br>To preview the browser (with reference only loaded), go <a href='" .$url."'> here </a>.  <br \>";
       echo "NOTE: if you preuploaded the file, the link may not work until JBrowse has finished building your browser.  If you see a blank screen, wait and reload. <br>" ;
       echo "To add tracks, please go <a href='/popupjb_track'> here </a>";
    } else { 
       echo "Your file must be .fa or .fasta format to be uploaded <br>";
    }
} elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
    if($fileType == "fa" || $fileType == "fasta" ) {
          $url = '/' . $popupjb_jblocshort . '/index.html?data=' . $_POST['out'];
          echo "<br>To preview the browser (with reference only loaded), go <a href='" .$url."'> here </a>.  <br \>";
          echo "To add tracks, please go <a href='/popupjb_track'> here </a>";
    } else { 
       echo "Your file must be .fa or .fasta format to be uploaded <br>";
    }
} else {
	echo $uploadOK;
	echo "Sorry, there was an error uploading or finding your file. <br>";
	echo "If you preuploaded the file, please check the file name.  It must be exact.  If you are uploading a file, it may be too large.  You may need to preupload it, see help instructions for more detail.";
}

// Need to create the command: 
//bin/prepare-refseqs.pl --fasta <fasta file> --out
$referenceload = $popupjb_jbloc . '/bin/prepare-refseqs.pl --fasta ' . $target_dir . $_FILES["fileToUpload"]["name"]  . ' --out jbrowse/' . $_POST['out'];

exec($referenceload);

?>
</body>
</html>

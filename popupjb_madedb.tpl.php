<html>
</body>
<?php

$popupjb_jbloc="/var/www/html/jbrowse/";
$target_dir=$popupjb_jbloc . "uploads/";

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
      echo "<br>Your file is a .fa <br>";
      $outloc = '/var/www/html/sites/default/files/' . $_POST["outname"];
      $referenceload = $popupjb_jbloc . '/bin/prepare-refseqs.pl --fasta ' . $target_dir . $_FILES["fileToUpload"]["name"]  . ' --out jbrowse/' . $_POST['out'];
      $makedb = 'makeblastdb -in ' . $target_file . ' -out ' . $outloc . ' -dbtype ' . $_POST["dbtype"];
   //   echo $makedb; 
      exec($makedb);
      echo "The location of your new database is below.  Please use this to add a new blast database (add content -> add Blast Database).<br>";
      echo $outloc;
    } else { 
       echo "Your file must be .fa or .fasta format to be uploaded <br>";
    }
} elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
    if($fileType == "fa" || $fileType == "fasta" ) {
      echo "Your uploaded file is a .fa <br>";
      $outloc = '/var/www/html/sites/default/files/' . $_POST["outname"];
      $referenceload = $popupjb_jbloc . '/bin/prepare-refseqs.pl --fasta ' . $target_dir . $_FILES["fileToUpload"]["name"]  . ' --out jbrowse/' . $_POST['out'];
      $makedb = 'makeblastdb -in ' . $target_file . ' -out ' . $outloc . ' -dbtype ' . $_POST["dbtype"];
     // echo $makedb; 
      exec($makedb);
      echo "<br>The location of your new database is below.  Please use this to add a new blast database (add content -> add Blast Database).";
      echo $outloc;
    } else { 
       echo "Your file must be .fa or .fasta format to be uploaded <br>";
    }
} else {
	echo "Sorry, there was an error uploading or finding your file. <br>";
	echo "If you preuploaded the file, please check the file name.  It must be exact.  If you are uploading a file, it may be too large.  You may need to preupload it, see help instructions for more detail.";
}

//Update blast_report
//echo "<br>start the jbrowse update!<br>";
$hash = $_POST['outname'] . "\t" . $_POST['jblink_name'] . "\n";
//echo $hash;
$handle = fopen("/var/www/html/sites/all/modules/tripal_blast_ext/jbrowse_hash.txt", "a+");
fwrite($handle, "$hash");
fclose($handle);


?>
</body>
</html>

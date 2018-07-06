<?php

$trackdel = $popupjb_jbloc . 'bin/remove-track.pl --dir ' . $popupjb_jbloc . $_POST['out'] . ' --trackLabel ' . $_POST['trackLabel'] . ' --delete';


exec($trackdel);

echo "<br>Your track " . $_POST['trackLabel'] . " should be removed. <br><br>";
$url = '/' . $popupjb_jblocshort . '/index.html?data=' . $_POST['out'];
echo "To go back to the browser (with track deleted), go <a href='" .$url."'> here</a>.  <br \>";

?>

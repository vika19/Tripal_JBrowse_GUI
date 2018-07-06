<html>
Note: This only works for small references on small Jetstream VMs.  For more information, contact ss93@iu.edu.

<body>
    <form method="post" action="/popupjb_refloaded" enctype="multipart/form-data">
        <p>If you already have a reference loaded, please proceed to <a href="/popupjb_track">here</a> </p>
        <section>
            <h2>Reference Information</h2>
            <p>
              <label for="trackLabel">
                <span>Reference Name (no spaces): </span>
              </label>
              <input type="text" id="datafolder" name="out">
            </p>
        </section>

       <h4> File to use:</h4>
	Did you pre-upload your file?
	<input type="radio" name="preupload"
	<?php if (isset($preupload) && $preupload=="yes") echo "checked";?>
	value="Yes ">Yes  
	<input type="radio" name="preupload"
	<?php if (isset($preupload) && $preupload=="no") echo "checked";?>
	value="No ">No 

	<br>
	<br>

	If yes, please specify the name of a file to use:
	<input type="text" id="uploadedFile" name="uploadedFile"
	<br>
	<br>
	If no, please specify a file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
	<br>
        <input type="submit" value="Submit" name="submit">
    </form>

</body>
</html>

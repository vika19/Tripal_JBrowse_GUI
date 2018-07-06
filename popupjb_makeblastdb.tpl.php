<html>
<body>
    <form method="post" action="/blocked" enctype="multipart/form-data">
        <h3>Reference Information</h3>
        <p>
            What would you like to call this reference:
            <input type="text" id="datafolder" name="outname">
        <br>
	What kind of database is it?
	<input type="radio" name="dbtype"
	<?php if (isset($dbtype) && $dbtype=="nucl") echo "checked";?>
	value="nucl">Nucleotide  
	<input type="radio" name="dbtype"
	<?php if (isset($dbtype) && $dbtype=="prot") echo "checked";?>
	value="prot">Protein
            </p>

       <h3> File to use:</h3>
	Did you pre-upload your file?
	<input type="radio" name="preupload"
	<?php if (isset($preupload) && $preupload=="yes") echo "checked";?>
	value="Yes ">Yes  
	<input type="radio" name="preupload"
	<?php if (isset($preupload) && $preupload=="no") echo "checked";?>
	value="No ">No 

	<br>
	If yes, please specify the name of a file to use:
	<input type="text" id="uploadedFile" name="uploadedFile">
	<br>
	If no, please specify a file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
	<br>
	<br>
	<h3> Do you want this linked to a JBrowse instance?</h3>
	<input type="radio" name="jblinktbd"
	<?php if (isset($jblinktbd) && $jblinktbd=="yes") echo "checked";?>
	value="Yes ">Yes  
	<input type="radio" name="jblinktbd"
	<?php if (isset($jblinktbd) && $jblinktbd=="no") echo "checked";?>
	value="No ">No 

	<br>
	If yes, please specify the name of the browser to use.  If you are not sure of the browser name, open the browser in another tab and select the information after 'data=' and before '&loc':
	<input type="text" id="jblink_name" name="jblink_name">
	<br>
	<br>
        <input type="submit" value="Submit" name="submit">
        </section>
    </form>

</body>
</html>

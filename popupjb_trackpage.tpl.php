<html>
<body>
<p>This form allows you upload your own data to an available browser.  If you are not an admin, you can add tracks to non-frozen browsers.  Please note, that if your tracks are not visible, hold shift and click reload.
    <form method="post"action="/popupjb_trackloaded" enctype="multipart/form-data">
        <h2>Browser Information</h2>
        <p>If you don't already have a reference loaded, please start with <a href="/popupjb_ref">here</a>.  Note: Available to Admins only. </p>
        <section>
            <p>
              <span>Target Reference Name (no spaces - i.e. browser_open): </span>
              <input type="text" id="datafolder" name="out">
            </p>
        </section>
        <section>
            <h2>New Track Information</h2>
              <label for="trackType">
               <h4> <span>Track File Type:</span></h4>
              </label>
              <select id="trackType" name="trackType">
                <option value="bam">BAM</option>
                <option value="bed">BED</option>
                <option value="gff">GFF</option>
                <option value="gbk">GBK</option>
                <option value="vcf">VCF</option>
              </select>
            <p>
              <label for="trackLabel">
                <span>Track label (no spaces):</span>
              </label>
                <input type="text" id="trackLabel" name="trackLabel">
            </p>
            <p>

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
        <br>If no, please specify a file to upload:
        <input type="file" name="trackToUpload" id="trackToUpload">
        <br>
        <input type="submit" value="Submit" name="submit">
        </section>
    </form>
</body>
</html>

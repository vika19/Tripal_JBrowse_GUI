<body>
    <form method="post"action="/popupjb_deleted" enctype="multipart/form-data">
        <h1>Browser Information</h1>
        <section>
            <p>
              <span>Reference Name Used (no spaces - listed in browser URL after data = ): </span>
              <input type="text" id="datafolder" name="out">
            </p>
        </section>
        <section>
            <h2>Target Track Information</h2>
            <p>
              <label for="trackLabel">
                <span>Target Track Label (as listed in browser):</span>
              </label>
                <input type="text" id="trackLabel" name="trackLabel">
            </p>
        </section>

        <h3> THIS WILL PERMENANTLY DELETE THE TRACK AND DATA.  IT IS NOT REVERSABLE! </h3>
        <input type="submit" value="Submit" name="submit">

    </form>
</body>

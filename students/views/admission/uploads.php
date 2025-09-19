<div class="span12 text-center"><div class="well well-small">
        <legend>Please upload your following files</legend>
        <h4>Note:</h4>
            <p>Supportive documents should be in .pdf format.</p>
            <p>Phtograph dimension should be 200 X 250 and in .jpg format.</p>
            <p>Signature scan should have the dimension 200 X 50 and in .jpg format.</p>
    </div></div>
<div class="span12">
    <?php if ($doc) { echo form_open_multipart('admission_uploads/doc'); ?>
        <legend>Supportive documents</legend>
        <?php if(isset($doc_error))echo $doc_error; ?>
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-append">
                <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                    <input type="file" name="userfile" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
            </div>
        </div>        
        <input type="submit" value="Upload" class="btn btn-primary"/></form>
    <?php } if ($photo) { echo form_open_multipart('admission_uploads/photo'); ?>
    <legend>Photograph</legend>
    <?php if(isset($photo_error))echo $photo_error; ?>
    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="input-append">
            <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                <input type="file" name="userfile" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
        </div>
    </div><input type="submit" value="Upload" class="btn btn-primary"/></form>
    <?php } if ($signature) { echo form_open_multipart('admission_uploads/signature'); ?>
    <legend>Signature</legend>
    <?php if(isset($signature_error))echo $signature_error; ?>
    <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="input-append">
            <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span>
                <input type="file" name="userfile" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
        </div>
    </div><input type="submit" value="Upload" class="btn btn-primary"/></form>
    <?php } ?>
</div>
<div class="span3">
</div>
<div class="span4">
    <h3 class="page-header">Site status</h3>
    <div class="well well-small">
    <h4>Site Current status: <?php echo $site_status; ?></h4>
    <p>Last status changed at <?php echo $status_changed_at; ?></p></div>
    <?php
    if ($site_status == 'blocked')
        echo '<a href="#siteActivation" role="button" class="btn btn-primary btn-large btn-block" data-toggle="modal">Activate Student site</a>';
    else
        echo '<a href="#siteActivation" role="button" class="btn btn-primary btn-large btn-block" data-toggle="modal">Block Student site</a>'
    ?>  
</div>
<div class="span8">
    <h3 class="page-header">Site title</h3>
    <?php echo form_open('admin/admin/update/title'); ?>
    <input type="text" name="title" value="<?php echo $title; ?>" class="input-block-level" />
    <input type="submit" value="Update" class="btn btn-block" />
</form>
    <h3 class="page-header">Site message</h3>
    <?php echo form_open('admin/admin/update/message'); ?>
    <textarea name="message" rows="12" class="input-block-level">
<?php echo $message; ?>
    </textarea>
    <input type="submit" value="Update" class="btn btn-block" />
</form>
</div>

<!-- Button to trigger modal -->

<!-- Modal -->
<div id="siteActivation" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Confirmation</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure, because this action will activate or block the student site temporarily.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <?php
    if ($site_status == 'blocked')
        echo anchor('admin/admin/admission_on_off/activated', 'Activate', 'class="btn btn-primary"');
    else
        echo anchor('admin/admin/admission_on_off/blocked', 'Block', 'class="btn btn-primary"');
    ?> 
  </div>
</div>
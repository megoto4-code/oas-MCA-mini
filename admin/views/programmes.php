<div class="span12">
    <legend>Add a new programme</legend>
    <?php
    $atts = array('class' => 'form-inline');
    echo form_open('admin/admin/programmes/add', $atts);
    ?>
    <div class="row">
        <div class="span2"><input type="text" name="pcode" value="" placeholder="Programme code" class="input-block-level" /></div>
        <div class="span4"><input type="text" name="pname" value="" placeholder="Programme name" class="input-block-level" /></div>
        <div class="span2"><input type="text" name="semesters" value="" placeholder="No of semesters" class="input-block-level" /></div>
        <div class="span2"><input type="text" name="fee" value="" placeholder="Programme fee" class="input-block-level" /></div>
        <div class="span2"><input type="submit" value="Add New" class="btn btn-block" /></div>
    </div>
</form>
</div>
<div class="span12"><?php echo validation_errors(); ?></div>
<div class="span12">
    <legend>Available programmes</legend>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Programme Code</th>
                <th>Description</th>
                <th>Semester</th>
                <th>fees</th>
                <th>Delete</th>                
            </tr>
        </thead>
        <tbody>
<?php foreach ($programmes as $programme) { ?>
                <tr>
                    <td><?php echo $programme->code; ?></td>
                    <td><?php echo $programme->name; ?></td>
                    <td><?php echo $programme->semesters; ?></td>
                    <td><?php echo $programme->fee; ?></td>
                    <td><?php echo anchor('admin/admin/delete/' . $programme->code, 'Delete'); ?></td>
                </tr>
<?php } ?>
        </tbody>
    </table>

</div>
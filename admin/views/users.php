<div class="span12">
    <h3 class="page-header">Users</h3>    
    <table class="table table-striped">
        <thead>
            <tr>                
                <th>User ID</th>
                <th>Email address</th>
                <th>Enrollment status</th>
                <th>Enrolled on</th>
                <th>Control ID</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>                    
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo auto_link($user->email); ?></td>
                    <td><?php echo $user->status; ?></td>
                    <td><?php echo $user->enroled_on; ?></td>
                    <td><?php echo $user->control_id; ?></td>
                    <td>
                        <?php
                        echo anchor('admin/users/user_detail/' . $user->id, 'View details', 'class="btn btn-mini pull-right" target="_blank"');
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    echo $pagination;
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Enrolment Status</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($s_status as $sts) { ?>
            <tr>
                <td><?php echo $sts->id; ?></td>
                <td><?php echo $sts->description; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
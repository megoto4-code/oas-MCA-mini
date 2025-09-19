<div class="span7">
    <h3 class="page-header">Admission Summery</h3>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Total users who are already enrolled:</td>
                <td><?php echo $user['level5']; ?></td>
            </tr>
            <tr>
                <td>Total users with payment completed:</td>
                <td><?php echo $user['level4']; ?></td>
            </tr>
            <tr>
                <td>Total users submitted their data and necessary files:</td>
                <td><?php echo $user['level3']; ?></td>
            </tr>
            <tr>
                <td>Total users submitted their data but not the necessary files:</td>
                <td><?php echo $user['level2']; ?></td>
            </tr>
            <tr>
                <td>Total users as normal registered:</td>
                <td><?php echo $user['level1']; ?></td>
            </tr>
            <tr>
                <td>Total users:</td>
                <td><?php echo $user['level0']; ?></td>
            </tr>
        </tbody>
    </table>        
    <h3 class="page-header">Recently enrolled</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Enrolment no</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recent_enroled as $user) { ?>
                <tr>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->enrolment_no ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
<div class="span5">
    <h3 class="page-header">Application Summery</h3>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Site name:</td>
                <td><?php echo $site_name; ?></td>
            </tr>
            <tr>
                <td>Site address:</td>
                <td><?php echo auto_link($site_url, 'both', TRUE); ?></td>
            </tr>
            <tr>
                <td>Site status:</td>
                <td><?php echo ucfirst($site_status); ?></td>
            </tr>
            <tr>
                <td>Site visits:</td>
                <td><?php echo $site_visits; ?></td>
            </tr>
        </tbody>
    </table>
    <h3 class="page-header">Recently registered users</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Status</th>
                <th>Created on</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recent_user as $user) { ?>
                <tr>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->status ?></td>
                    <td><?php echo $user->created_on ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
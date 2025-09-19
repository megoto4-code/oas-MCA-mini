<div class="span4">
    <h4 class="page-header">Applicant</h3>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $per['name']; ?></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><?php echo $per['dob']; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo $per['gender']; ?></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><?php echo $per['category']; ?></td>
                </tr>
                <tr>
                    <td>Local guardian:</td>
                    <td><?php echo $per['guardian']; ?></td>
                </tr>
                <tr>
                    <td>Religion:</td>
                    <td><?php echo $per['religion']; ?></td>
                </tr>
            </tbody>
        </table>
        <h4 class="page-header">Contact Information:</h4>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Phone number:</td>
                    <td><?php echo $con['phone']; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $con['address']; ?></td>
                </tr>
                <tr>
                    <td>District:</td>
                    <td><?php echo $con['district']; ?></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><?php echo $con['city']; ?></td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><?php echo $con['state']; ?></td>
                </tr>
                <tr>
                    <td>Pin:</td>
                    <td><?php echo $con['pin']; ?></td>
                </tr>
            </tbody>
        </table>
</div><div class="span5">
    <h4 class="page-header">Applied for:</h4>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Programme name:</td>
                <td><?php echo $qua['programme']; ?></td>
            </tr>
            <tr>
                <td>Relevant qualification:</td>
                <td><?php echo $qua['qualification']; ?></td>
            </tr>
            <tr>
                <td>Subjects:</td>
                <td><?php echo $qua['subjects']; ?></td>
            </tr>
            <tr>
                <td>Year of passing:</td>
                <td><?php echo $qua['passing_year']; ?></td>
            </tr>
            <tr>
                <td>Percentage:</td>
                <td><?php echo $qua['percentage']; ?></td>
            </tr>
            <tr>
                <td>Board:</td>
                <td><?php echo $qua['board']; ?></td>
            </tr>
        </tbody>
    </table>        
    <h4 class="page-header">User Account Information:</h4>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Email Address</td>
                <td><?php echo $user['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo $user['status']; ?></td>
            </tr>
            <tr>
                <td>Enrollment number</td>
                <td><?php echo $user['enrolment_no']; ?></td>
            </tr>
            <tr>
                <td>Enrolled on</td>
                <td><?php echo $user['enroled_on']; ?></td>
            </tr>
            <tr>
                <td>Control ID</td>
                <td><?php echo $user['control_id']; ?></td>
            </tr>
            <tr>
                <td>Created on</td>
                <td><?php echo $user['created_on']; ?></td>
            </tr>
        </tbody>
    </table>

</div>
<div class="span3 text-center">    
    <h4 class="page-header">Photo &amp; Signature</h4>
    <?php
    if (isset($control_id) && $status > 2) {
        $photo = array(
            'src' => 'uploads/student_files/' . $control_id . '_photo.jpg',
            'alt' => 'Photo of ' . $control_id,
            'class' => 'img-polaroid',
        );
        echo img($photo);
        $signature = array(
            'src' => 'uploads/student_files/' . $control_id . '_signature.jpg',
            'alt' => 'Signature of ' . $control_id,
            'class' => 'img-polaroid',
        );
        echo img($signature);
        ?> 
        <h4 class="page-header">Supportive documents</h4>
        <?php
        echo anchor('uploads/student_files/' . $control_id . '_document.pdf', 'View document', 'class="btn btn-large" target="_blank"');
    } else {
        ?>
        <h4 class="text-info">Not uploaded required files</h4>
    <?php } ?>
</div>
<div class="row-fluid">
<div class="span9">
    <h4 class="page-header">Payment details:</h4>
    <?php
    if (isset($exist_payment)) {
        if ($exist_payment) {
            ?>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Date of payment:</td>
                        <td>
                            <?php
                            if (isset($pay['payment_date']))
                                echo $pay['payment_date'];
                            else {
                                echo '<strong class="text-error">Yet not paid</strong>&nbsp;';
                                echo anchor('admin/users/payment_confirmed/' . $user['id'], 'Payment Confirmed', 'class="btn btn-primary btn-mini pull-right"');
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td><?php echo $pay['amount']; ?></td>
                    </tr>
                    <tr>
                        <td>Draft number:</td>
                        <td><?php echo $pay['draft_no']; ?></td>
                    </tr>
                    <tr>
                        <td>Draft date:</td>
                        <td><?php echo $pay['draft_date']; ?></td>
                    </tr>
                    <tr>
                        <td>Bank:</td>
                        <td><?php echo $pay['bank']; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php } else {
            ?>
            <h4 class="text-info">Not submitted payment details yet.</h4>
    <?php }
} ?>
</div>
</div>
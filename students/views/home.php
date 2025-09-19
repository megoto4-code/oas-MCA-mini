<div class="span12">
    <legend>Admission status</legend>
    <?php if ($student['status'] == 5) { ?>
        <div class="well well-small text-center">
            <h3>Congratulation <?php echo mailto($user_email); ?>, You are admitted.</h3>
            <h3>Your Enrolment number is <span class="text-info"><?php echo $student['enrolment_no']; ?></span></h3>
            <h3>Admitted on <?php echo $student['enroled_on']; ?></h3>
        </div>
    <?php } ?>
</div>
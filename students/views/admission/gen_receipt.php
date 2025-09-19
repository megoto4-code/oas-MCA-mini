<?php
/* This is th estandalone generate 
 * receipt page which does not use template
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php
        echo link_tag('assets/bootstrap.min.css');
        ?>
        <script>
            function printpage() {
                window.print();
            }
        </script>
        <style>
            @media print {
                .btn, .hint {
                    display:none;
                }
            }
            h4 {
                font-weight: lighter;
                overflow: hidden;
            }
            h4 em {
                width: 30%;
                display: inline-block;
                float: left
            } 
            h4 strong {
                width: 70%;
                display: inline-block;
                float: left
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="span6">
                    <h3 class="page-header text-center">Online Admission System Receipt</h3>
                </div>
                <div class="span6">
                    <h3 class="page-header text-center">
                        <?php echo 'Receipt ID: <em>' . $control_id . '</em>'; ?>
                    </h3>
                </div>
                <div class="span3 text-center">
                    <legend>Photo and Signature</legend>
                    <?php
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
                </div>
                <div class="span9">
                    <legend>Applicant Information:</legend>
                    <h4><em>Name:</em> <strong><?php echo $per['name']; ?></strong></h4>
                    <h4><em>Date of Birth:</em> <strong><?php echo $per['dob']; ?></strong></h4>
                    <h4><em>Gender:</em> <strong><?php echo $per['gender']; ?></strong></h4>
                    <h4><em>Category:</em> <strong><?php echo $per['category']; ?></strong></h4>
                    <h4><em>Local guardian:</em> <strong><?php echo $per['guardian']; ?></strong></h4>
                    <h4><em>Religion:</em> <strong><?php echo $per['religion']; ?></strong></h4>

                    <legend>Applied for:</legend>
                    <h4><em>Programme name:</em> <strong><?php echo $qua['programme']; ?></strong></h4>
                    <h4><em>Relevant qualification:</em> <strong><?php echo $qua['qualification']; ?></strong></h4>
                    <h4><em>Year of passing:</em> <strong><?php echo $qua['passing_year']; ?></strong></h4>
                    <h4><em>Percentage:</em> <strong><?php echo $qua['percentage']; ?></strong></h4>

                    <legend>Contact Information:</legend>
                    <h4><em>Email address:</em> <strong><?php echo $user_email; ?></strong></h4>
                    <h4><em>Phone number:</em> <strong><?php echo $con['phone']; ?></strong></h4>
                    <h4><em>Address:</em> <strong><?php echo $con['address']; ?></strong></h4>
                    <h4><em>District:</em> <strong><?php echo $con['district']; ?></strong></h4>
                    <h4><em>City:</em> <strong><?php echo $con['city']; ?></strong></h4>
                    <h4><em>Pin:</em> <strong><?php echo $con['pin']; ?></strong></h4>
                    
                    <legend>Payment Details:</legend>
                    <h4><em>Draft number:</em> <strong><?php echo $pay['draft_no']; ?></strong></h4>
                    <h4><em>Draft date:</em> <strong><?php echo $pay['draft_date']; ?></strong></h4>
                    <h4><em>Bank name:</em> <strong><?php echo $pay['bank']; ?></strong></h4>                  
                </div>
            </div><hr/>
            <div class="text-center">                
                <p>On <em><?php
                        $datestring = "%Y - %m - %d - %h:%i %a";
                        $time = time();
                        echo mdate($datestring, $time);
                        ?></em>. Copyright &copy; Online Admission System</p>
                <p class="hint">If scrolling is not working, refresh the page by pressing F5.</p>
                <p><input class="btn btn-large" type="button" value="Print this page" onclick="printpage()" /></p>
            </div>
        </div>
    </body>
</html>

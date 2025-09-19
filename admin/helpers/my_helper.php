<?php

function dob($start, $end) {
    years($start, $end, '');
    months('');
    days('');
}

function years($start, $end, $class) {
    echo '<select name="year" class="' . $class . '">';
    echo '<option value="" selected="selected">YYYY</option>';
    for ($i = $start; $i <= $end; $i++) {
        echo '<option value="' . $i . '"' . set_select('year', $i) . '>' . $i . '</option>';
    }
    echo '</select> ';
}

function months($class) {
    $mm = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    echo '<select name="month" class="' . $class . '">';
    echo '<option value="" selected="selected">MM</option>';
    for ($i = 0; $i < 12; $i++) {
        echo '<option value="' . ($i + 1) . '"' . set_select('month', ($i + 1)) . '>' . $mm[$i] . '</option>';
    }
    echo '</select> ';
}

function days($class) {
    echo '<select name="day" class="' . $class . '">';
    echo '<option value="" selected="selected">DD</option>';
    for ($i = 1; $i <= 31; $i++) {
        echo '<option value="' . $i . '"' . set_select('day', $i) . '>' . $i . '</option>';
    }
    echo '</select>';
}

function gender($class) {
    echo '<select name="gender" class="' . $class . '">';
    echo '<option value="" selected="selected">Select</option>';
    echo '<option value="male">Male</option>';
    echo '<option value="female">Female</option>';
    echo '</select>';
}

function religion($class) {
    echo '<select name="religion" class="' . $class . '">';
    echo '<option value="" selected="selected">Select</option>';
    echo '<option>Hindu</option>';
    echo '<option>Muslim</option>';
    echo '<option>Chirtian</option>';
    echo '<option>Sikh</option>';
    echo '<option>Jain</option>';
    echo '<option>Budhist</option>';
    echo '<option>Parsi</option>';
    echo '<option>Jews</option>';
    echo '<option>Others</option>';
    echo '</select>';
}

function category($class) {
    echo '<select name="category" class="' . $class . '">';
    echo '<option value="" selected="selected">Select</option>';
    echo '<option>General</option>';
    echo '<option>SC</option>';
    echo '<option>ST</option>';
    echo '<option>OBC</option>';
    echo '</select>';
}
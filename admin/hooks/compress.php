<?php /*
 * Compress HTML output [for Codeigniter]
 * IMPORTANT: if you have any JavaScript within the HTML
 * (not in a .JS file) make sure you don’t have JavaScripts comments in it.
 * Use the PHP comment system instead.
 */
  
function compress() {
$CI = & get_instance();
$buffer = $CI->output->get_output();

$search = array(
'/\>[^\S ]+/s',
'/[^\S ]+\</s',
'/(\s)+/s', // shorten multiple whitespace sequences
'#(?://)?<!\[CDATA\[(.*?)(?://)?\]\]>#s' //leave CDATA alone
);
$replace = array(
'>',
'<',
'\\1',
"//&lt;![CDATA[\n" . '\1' . "\n//]]>"
);

$buffer = preg_replace($search, $replace, $buffer);

$CI->output->set_output($buffer);
$CI->output->_display();
}

?>

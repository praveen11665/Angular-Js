<?php
/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */

function get_buttons($id)
{
    if(is_integer($id))
    {
    	$html = 'Y - '.$id;
    }else
    {
    	$html = 'N - '.$id;
    }

    return $html;
}
?>
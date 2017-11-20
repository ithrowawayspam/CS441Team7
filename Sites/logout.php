<?php
require_once('use/load.php');
if (!$session->logout()) {
    goToPage("index.php");
}
?>

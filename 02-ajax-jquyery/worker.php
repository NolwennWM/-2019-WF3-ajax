<?php
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    echo $_POST['sentence'] ?? 'No sentence';
}

?>
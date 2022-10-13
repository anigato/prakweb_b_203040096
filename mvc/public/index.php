<?php
//jika sebelumnya tidak ada sesion, maka buat session baru
if(!session_id()) session_start();

require_once '../app/init.php';

$app = new App();
<?php
session_start();
if (!isset($_SESSION["loged_in_front"])) {
    header("Location: /ChristieMeta/index.php/login");
}

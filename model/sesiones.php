<?php
session_start();
if (!isset($_SESSION["loged_in"])) {
    header("Location: /ChristieMeta/index.php/admin/login");
}

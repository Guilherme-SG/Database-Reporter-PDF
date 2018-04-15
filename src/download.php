<?php
    include '../MPDF60/mpdf.php';
    include 'autoload.php';
    $reader = new ReportReader();
    $printer = new ReportPrinter();

    $reports = $reader->readAllReports();
    $printer->_print($reports);
?>
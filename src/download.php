<?php
    include '../MPDF60/mpdf.php';
    include 'autoload.php';
    
    // Change configs to your connection
    $mySqlConfig = new MySqlConfig('localhost', 'root', 'usbw', 'db_report_pdf', 'utf8');
    $reader = new ReportReader($mySqlConfig);
    $printer = new ReportPrinter();

    $reports = $reader->readAllReports();
    $printer->_print($reports);
?>
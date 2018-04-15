<?php
class ReportPrinter{
    private $mpdf;

    public function __construct() {
        $this->mpdf = new mPDF();
    }

    public function _print(array $reports) {
        $page = ReportPageBuilder::generatePage($reports);
        $this->mpdf->WriteHTML($page);
        $this->mpdf->Output("report.pdf", 'I');
    }
}
?>
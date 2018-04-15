<?php
class ReportReader{
    private $report;
    private $mySqlCrud;

    public function __construct(MySqlConfig $config) {
        $this->mySqlCrud = new MySqlCRUD($config);
    }

    public function readAllReports() {
        $dataset = $this->mySqlCrud->read("tb_report");

        $reports = [];
        foreach($dataset as $report) {
            array_push($reports, $this->createReport($report));
        }
        return $reports;
    }

    private function createReport($data) {
        return new Report(
            $data['nm_task'], 
            $data['ds_task'], 
            $data['ds_issue'], 
            $data['ds_sugestion']
        );
    }

}
?>
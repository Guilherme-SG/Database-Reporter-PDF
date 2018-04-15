<?php
class ReportRecorder {
    private $report;
    private $mySqlCrud;

    public function __construct(MySqlConfig $config) {
        $this->mySqlCrud = new MySqlCRUD($config);
    }

    public function record(Report $report) {        
        $report = [
            'nm_task' => $report->getTask(), 
            'ds_task' => $report->getTaskDescription(), 
            'ds_issue' => $report->getIssue(), 
            'ds_sugestion' => $report->getSugestion()
        ];    
        return $this->mySqlCrud->insert('tb_report', $report);
    }
}
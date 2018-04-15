<?php
class Report {
    private $task, $taskDescription, $issue, $sugestion;

    public function __construct($task, $taskDescription, $issue, $sugestion) {
        $this->task = $task;
        $this->taskDescription = $taskDescription;
        $this->issue = $issue;
        $this->sugetion = $sugestion;
    }

    public function getTask() {
        return $this->task;
    }

    public function getTaskDescription() {
        return $this->taskDescription;
    }

    public function getIssue() {
        return $this->issue;
    }

    public function getSugestion() {
        return $this->sugetion;
    }
}
?>

<?php
class ReportPageBuilder{
    public static function generatePage(array $reports) {
        $page =
            "<html>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='stylesheet' href='css/components.css'>
                    <link rel='stylesheet' href='css/icons.css'>
                    <link rel='stylesheet' href='css/responsee.css'>
                    <link rel='stylesheet' href='src/css/misc.css'>
                    <link rel='stylesheet' href='src/css/style.css'>
                    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
                    <link href='https://fonts.google.com/specimen/Poppins?selection.family=Poppins' rel='stylesheet' type='text/css'>
                </head>
                <body>
                    <h1 class='text-center'>Relátorio de tarefa</h1>
                    <ul>".
                        self::generatePageData($reports) ."
                    </ul>
                </body>
            </html>";    
        
        return $page;
    }

    private static function generatePageData(array $reports) {
        $pageData = [];
        foreach($reports as $report) {
            $pageData[] = 
            "<li>
                <ul>
                    <li>Tarefa: {$report->getTask()}</li>
                    <li>Descrição: {$report->getTaskDescription()}</li>
                    <li>Dificuldades: {$report->getIssue()}</li>
                    <li>Sugestões: {$report->getSugestion()}</li>
                </ul>
            </li>";
        }

        return implode("<hr>", $pageData);
    }
}
?>
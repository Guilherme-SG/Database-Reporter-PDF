<?php
    if(isset($_POST['send'])) {
        include 'autoload.php';
        $report = new Report(
            $_POST['task'], 
            $_POST['description'], 
            $_POST['issue'], 
            $_POST['sugestion']
        );

        // Change configs to your connection
        $mysqlconfig = new MySqlConfig('localhost', 'root', 'usbw', 'db_report_pdf', 'utf8');
        $recorder = new ReportRecorder($mysqlconfig);
        $isRecorded = $recorder->record($report);

        if($isRecorded) {
            echo "Relatório salvo com sucesso";
        }
        else {
            echo "Algo de errado não está certo";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/responsee.css">
    <link rel="stylesheet" href="css/misc.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.2/sweetalert2.css"/>
    <link href='https://fonts.google.com/specimen/Poppins?selection.family=Poppins' rel='stylesheet' type='text/css'>

    <title>Impressão de relatorio via banco de dados</title>
</head>
<body class="size-1520">
    <section class="section background-white">
        <h1 class="text-center">Relatório da tarefa realizada hoje</h1>
        <div class="line">
            <div class="s-12 m-12 l-6">
                <a class="button submit-btn margin-bottom text-white text-strong" href="download.php">Imprimir relatórios</a>
            </div>
            <div class="s-12 m-12 l-6 center">
                <form name="report" class="customform padding-2x block-bordered" action="create.php" method="POST">
                    <div class="line">
                        <div class="margin">
                            <label class="text-dark" for="task">Tarefa</label>
                            <input 
                                type="text" 
                                name="task" 
                                id="task" 
                                maxlength=100 
                                placeholder="Tarefa realizada pela equipe" 
                                required>
                        </div>
                    </div>
        

                    <div class="line">
                        <div class="margin">
                            <label class="text-dark" for="description">Descrição (opcional) </label>
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="3" cols="50" 
                                style="resize:none"
                                maxlength=800 
                                placeholder="Descreva a tarefa"></textarea>
                        </div>
                    </div>

                    <div class="line">
                        <div class="margin">
                            <label class="text-dark" for="issue">Dificuldades com a tarefa</label>
                            <textarea 
                                name="issue" 
                                id="issue" 
                                rows="3" cols="50" 
                                style="resize:none" 
                                maxlength=800 
                                placeholder="Quais problemas/dificuldades surgiram com a tarefa"
                                required></textarea>
                        </div>
                    </div>
                    
                    <div class="line">
                        <div class="margin">
                            <label class="text-dark" for="sugestion">Sugestões</label>
                            <textarea 
                                name="sugestion" 
                                id="sugestion" 
                                rows="3" cols="50" 
                                style="resize:none" 
                                maxlength=800 
                                placeholder="O que podemos fazer para melhorar o trabalho"
                                required></textarea>
                        </div>
                    </div>
                    
                    <div class="line">
                        <div class="s-12 m-12 l-7 center">
                            <button class="submit-form button border-radius call-to-action 
                            text-size-16 text-m-size-12 text-s-size-12 text-strong" type="submit" name="send">Registrar</button>
                        </div>
                    </div>
                </form> 
            <div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="lib/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/responsee.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <?php
    include __DIR__ ."/static/templates/navBar.html";
    ?>
    <div style="width: 100%; height:100%; display:flex; align-items:center; justify-content:center; flex-direction:column;">

        <div class="create-task">
            <form action="" method="post">
                <input type="text" name="task" id="task" placeholder="Devo fazer...">
                <input type="submit" value="Salvar">
            </form>
        </div>
        <div class="task-list">
            <div class="task-item">
                <span>TASK1</span>
                <div class="task-icons">
                <i class="fi fi-br-cross"></i>
                    <span>ICONE2</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
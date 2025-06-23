<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administração - Cadastro App</title>
    <meta name="description" content="Painel de Administração" />
    <meta name="author" content="Lovable" />
    <link rel="stylesheet" href="/src/styles.css">
    <link rel="stylesheet" href="../css/gerenciamento.css">
    <script src="../JS/sweetalert.js"></script>
   
</head>

<?php
@session_start();
if (isset($_SESSION["msg"])) {
    echo "<script>
    Swal.fire({
        title: '{$_SESSION['msg']}',
        text: '{$_SESSION['alertMsg']}',
        icon: '{$_SESSION['alertIcon']}'
    });
</script>";
    unset($_SESSION["msg"]);
    unset($_SESSION["alertMsg"]);
    unset($_SESSION["alertIcon"]);
}
?>

<body>


    <div class="container">
        <div class="admin-card">
            <div class="admin-card-header">
                <div class="admin-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="admin-icon">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Log de Eventos
                </div>
                <a href="adm.php" class="admin-button outline">Voltar</a>
            </div>


            <div class="admin-card-content">
                <div class="admin-table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Ação</th>
                                <th>IP</th>
                                <th>Categoria</th>
                                <th>Data e Hora</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            require_once("../model/connect.php");

                            $eventos = mysqli_query($con, "SELECT l.*,DATE_FORMAT(l.dataHora, '%d/%m/%Y - %H:%i') AS data_formatada, u.nome AS nomeUsuario FROM `log` l
                            LEFT JOIN usuario u ON l.id_usuario = u.id
                            ORder by l.dataHora desc
                            LIMIT 150;
");



                            while ($evento = mysqli_fetch_assoc($eventos)) {
                                
                            ?>
                                <tr <?php
                                    if($evento['acao'] == "Login") {
                                        echo 'style="background-color: #d4edda;"';
                                    } else if($evento['acao'] == "Indicação"){
                                        echo 'style="background-color:rgb(252, 255, 77);"';
                                    }else{
                                        echo 'style="background-color:rgb(255, 172, 77);"';
                                    }
                                
                                ?>>
                                    <td class="name-cell">
                                    <?php 
                                        if($evento['nomeUsuario'] == null){
                                            echo "Visitante";
                                        }else{
                                            echo $evento['nomeUsuario'];
                                        }
                                    
                                    ?>    
                                    
                                       </td>
                                    <td><?php 
                                        if($evento['acao'] == "Visitante"){
                                            echo "Login";
                                        }else{
                                            echo $evento['acao'];
                                        }
                                    
                                    ?> </td>
                                    <td><?= $evento['ip'] ?></td>
                                    <td><?= $evento['categoria'] ?></td>
                                    <td><?= $evento['data_formatada'] ?></td>
               
                                    
                                    
                                </tr>

                            <?php
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>© 2025 App. Todos os direitos reservados.</p>
        </div>
    </div>

    
</body>

</html>
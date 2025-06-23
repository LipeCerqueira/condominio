<?php
require_once("../model/connect.php");

$profissao_id = isset($_GET['profissao_id']) ? intval($_GET['profissao_id']) : 0;

$query = "SELECT profissional.*, profissao.*, DATE_FORMAT(profissional.horaIndicacao, '%d/%m/%Y - %H:%i') AS data_formatada 
         FROM profissional
         INNER JOIN profissao ON profissional.idProfissao = profissao.idProfissao";
if ($profissao_id > 0) {
    $query .= " WHERE profissional.idProfissao = $profissao_id ORDER BY profissional.nome";
}else{
    $query .= " ORDER BY profissional.nome";
}

$resultado = mysqli_query($con, $query);

while ($usuario = mysqli_fetch_assoc($resultado)) {
?>
    <tr>
        <td class="name-cell"><?= $usuario['nome'] ?></td>
        <td><?= $usuario['telefone'] ?></td>
        <td><?= $usuario['nomeProfissao'] ?></td>
        <td>
            <?php
            if ($usuario['status'] == 0) {
                echo '<span class="status-badge inactive">Inativo</span>';
            } else {
                echo '<span class="status-badge active">Ativo</span>';
            }
            ?>
        </td>
        <td class="actions-cell">
        <button class="admin-button small outline" onclick="editar(<?= $usuario['id'] ?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="button-icon">
                                                <path d="M12 20h9"></path>
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                            </svg>
                                            Editar
                                        </button>
                                        <?php
                                        if ($usuario['status'] == 0) {
                                            echo '<button class="admin-button small outline" onclick="mudarStatusProfissional(' . $usuario['id'] . ', ' . $usuario['status'] . ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="button-icon"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> Ativar</button>';
                                        } else {
                                            echo '<button class="admin-button small destructive" onclick="mudarStatusProfissional(' . $usuario['id'] . ',' . $usuario['status'] . ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="button-icon"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg> Inativar</button>';
                                        }

                                        ?>
                                        <?php

                                        if ($usuario['destaque'] == 0) {
                                        ?>
                                            <button class="admin-button small outline" onclick="destacar(<?= $usuario['id'] ?> , <?= $usuario['destaque'] ?>)" style="background-color: yellow; color: black;">
                                                <i class="fa-solid fa-star" style="color: gold;"></i>
                                                Destacar
                                            </button>
                                        <?php



                                        } else {

                                        ?>
                                            <button class="admin-button small outline" style="background-color: yellow; color: black;" onclick="destacar(<?= $usuario['id'] ?> , <?= $usuario['destaque'] ?>)">
                                                <i class="fa-solid fa-star" style="color: gold;"></i>
                                                Mudar
                                            </button>
                                        <?php
                                        }


                                        ?>
        </td>
    </tr>
<?php
}
?>
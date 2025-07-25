<?php
require_once("../model/connect.php");


require("partes/header.php");


// Filtro de área
$areaSelecionada = isset($_GET['area']) ? $_GET['area'] : '';

// Mês e ano atual ou selecionado
$ano = isset($_GET['ano']) ? intval($_GET['ano']) : date('Y');
$mes = isset($_GET['mes']) ? intval($_GET['mes']) : intval(date('m'));
if ($mes < 1 || $mes > 12) {
  $mes = intval(date('m'));
}

$primeiroDiaSemana = date('w', strtotime("$ano-$mes-01"));
$diasNoMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

// Buscar áreas
$areas = mysqli_query($con, "SELECT * FROM area WHERE status = 1");

// Buscar agendamentos do mês
$sql = "SELECT ag.*,a.*, u.bloco, 
DATE_FORMAT(ag.hora_inicio, '%H:%i') AS inicio,
DATE_FORMAT(ag.hora_fim, '%H:%i') AS fim,
u.unidade AS num_unidade
FROM agendamento_area_comum ag 
INNER JOIN area a ON a.id_area = ag.id_area 
left JOIN unidades u ON u.id = ag.unidade 
WHERE MONTH(ag.data_agendamento) = $mes AND YEAR(ag.data_agendamento) = $ano";
if ($areaSelecionada != '') {
  $sql .= " AND ag.id_area = '$areaSelecionada'";
}
$eventosQuery = mysqli_query($con, $sql);

$eventos = [];
while ($e = mysqli_fetch_assoc($eventosQuery)) {
  $dia = date('j', strtotime($e['data_agendamento']));
  $eventos[$dia][] = $e;
}

$nomesMeses = ["", "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
$nomesDias = ["Domingo", "Segunda-Feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];
?>

<link rel="stylesheet" href="../css/setup.css">

<div class="cabecalho">

  <form method="GET">
    <a href="adm.php" id="btnVoltar">Voltar</a>
    <label>Ano: <input type="number" name="ano" value="<?= $ano ?>" min="2020"></label>
    <label>Mês:
      <select name="mes">
        <?php for ($i = 1; $i <= 12; $i++): ?>
          <option value="<?= $i ?>" <?= ($i == $mes) ? 'selected' : '' ?>><?= $nomesMeses[$i] ?></option>
        <?php endfor; ?>
      </select>
    </label>
    <label>Área:
      <select name="area">
        <option value="">Todas</option>
        <?php while ($a = mysqli_fetch_assoc($areas)): ?>
          <option value="<?= $a['id_area'] ?>" <?= ($areaSelecionada == $a['id_area']) ? 'selected' : '' ?>>
            <?= $a['nome'] ?>
          </option>
        <?php endwhile; ?>
      </select>
    </label>
    <button type="submit">Filtrar</button>
  </form>
</div>

<h2 style="text-align:center;"><?= $nomesMeses[$mes] ?>/<?= $ano ?></h2>

<table class="calendario">
  <tr>
    <?php foreach ($nomesDias as $i => $dia): ?>
      <th class="<?= ($i == 0 || $i == 6) ? 'sab' : '' ?>"><?= $dia ?></th>
    <?php endforeach; ?>
  </tr>

  <?php
  $dia = 1;
  $semana = 0;
  echo "<tr>";
  for ($i = 0; $i < 7; $i++) {
    if ($i < $primeiroDiaSemana) {
      echo "<td></td>";
    } else {
      echo "<td><strong>$dia</strong>";
      if (isset($eventos[$dia])) {
        foreach ($eventos[$dia] as $ev) {
          echo "<div class='evento'>" .
            htmlspecialchars($ev['observacoes']) . " - " .
            htmlspecialchars($ev['id_morador']) . "<br>" .
            "<strong>Horário: " .
            htmlspecialchars($ev['inicio']) . " - " .
            htmlspecialchars($ev['fim']) . "</strong><br>" .
            "" . htmlspecialchars($ev['bloco']) . " - Número: " .
            htmlspecialchars($ev['num_unidade']) . "<br>Área: " .
            htmlspecialchars($ev['nome']) .
            "</div>";
        }
      }
      echo "</td>";
      $dia++;
    }
  }
  echo "</tr>";

  while ($dia <= $diasNoMes) {
    echo "<tr>";
    for ($i = 0; $i < 7; $i++) {
      if ($dia <= $diasNoMes) {
        echo "<td><strong>$dia</strong>";
        if (isset($eventos[$dia])) {
          foreach ($eventos[$dia] as $ev) {
            echo "<div class='evento'>" .
              htmlspecialchars($ev['observacoes']) . " - " .
              htmlspecialchars($ev['id_morador']) . "<br>" .
              "<strong>Horário: " .
              htmlspecialchars($ev['inicio']) . " - " .
              htmlspecialchars($ev['fim']) . "</strong><br>" .
              "" . htmlspecialchars($ev['bloco']) . " - Número: " .
              htmlspecialchars($ev['num_unidade']) . "<br>Área: " .
              htmlspecialchars($ev['nome']) .
              "</div>";
          }
        }
        echo "</td>";
        $dia++;
      } else {
        echo "<td></td>";
      }
    }
    echo "</tr>";
  }
  ?>
</table>
<?php

require("partes/footer.php");
?>
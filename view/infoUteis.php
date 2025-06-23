<?php require("sec.php") ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informações Úteis</title>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="styles.css" -->
<link rel="stylesheet" href="../css/paginaInicial.css">
<link rel="stylesheet" href="../css/infoUteis.css">
<!-- link rel="stylesheet" href="../css/setup.css" -->
 
	<script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <style>

  </style>
</head>

<body>
  <!-- Header -->
  <?php

  require("partes/header.php");
  ?>

  <!-- Main Content -->
  <main class="main-content">
    <div class="container">
      <!-- Useful Information Section -->
      <section id="useful-info">
        <h2 class="section-title">Informações Úteis</h2>
        <p class="section-description">Encontre os telefones de emergência</p>

        <div class="info-cards-grid">
          <a class="info-card" href="tel:190">
            <div class="icon-circle">
              <i class="fas fa-shield-alt"></i>
            </div>
            <div class="phone-number">190</div>
            <div class="service-name">Polícia Militar</div>
          </a>

          <a class="info-card" href="tel:192">
            <div class="icon-circle">
              <i class="fas fa-ambulance"></i>
            </div>
            <div class="phone-number" >192</div>
            <div class="service-name">SAMU</div>
</a>

          <a class="info-card" href="tel:193">
            <div class="icon-circle">
              <i class="fas fa-fire-extinguisher"></i>
            </div>
            <div class="phone-number" >193</div>
            <div class="service-name">Bombeiros</div>
</a>

          <a class="info-card" href="tel:199"> 
            <div class="icon-circle">
              <i class="fas fa-house-damage"></i>
            </div>
            <div class="phone-number" >199</div>
            <div class="service-name">Defesa Civil</div>
</a>

          <a class="info-card" href="tel:153" >
            <div class="icon-circle">
              <i class="fas fa-user-shield"></i>
            </div>
            <div class="phone-number" >153</div>
            <div class="service-name">CGM</div>
</a>

          <a class="info-card" href="tel:181">
            <div class="icon-circle">
              <i class="fas fa-comment-alt"></i>
            </div>

            <div class="phone-number" >181</div>
            <div class="service-name">Disque-Denúncia</div>

</a>

          <a class="info-card" href="tel:180">
            <div class="icon-circle">
              <i class="fas fa-female"></i>
            </div>
            <div class="phone-number" >180</div>
            <div class="service-name">Atendimento à Mulher</div>
</a>

          <a class="info-card"  href="tel:154">
            <div class="icon-circle">
              <i class="fas fa-car"></i>
            </div>
            <div class="phone-number">154</div>
            <div class="service-name">Detran</div>
</a>

          <a class="info-card" href="tel:100">
            <div class="icon-circle">
              <i class="fas fa-hands-helping"></i>
            </div>
            <div class="phone-number" >100</div>
            <div class="service-name">Direitos Humanos</div>
</a>

          <a class="info-card" href="tel:141">
            <div class="icon-circle">
              <i class="fas fa-heart"></i>
            </div>
            <div class="phone-number" >141</div>
            <div class="service-name">Centro de valorização da vida</div>
</a>
        </div>
      </section>
      <section id="useful-info">
        <!-- <h2 class="section-title">Informações Úteis</h2>
        <p class="section-description">Telefones importantes e contatos de emergência para o seu dia a dia.</p> -->

        <div class="useful-contacts">
          <div class="contact-item">
            <div class="contact-name">1º Cartório de Notas e Protestos</div>
            <div class="contact-details">
              Rua João Pires, 387 – Centro<br>
              Telefone (11) 4414-1140
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">2º Cartório de Notas e Protestos</div>
            <div class="contact-details">
              Rua Thomé Franco, 291 – centro<br>
              Telefone (11) 4402-2222
            </div>
          </div>
          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Catatreco Atibaia</div>
            <div class="contact-details">
              Telefone (11) 94029-4218
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">ACIA – Associação Comercial Industrial Atibaia</div>
            <div class="contact-details">
              R. José Pires, 239 – Centro<br>
              Telefone: (11) 4411-5544
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Assistência e Desenvolvimento Social</div>
            <div class="contact-details">
              Rua Zeferino Alves do Amaral, 78 – Centro<br>
              (11) 4414-0650<br>
              assistenciasocial@atibaia.sp.gov.br
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Autopista Fernão Dias</div>
            <div class="contact-details">
              0800-283-0381
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Batalhão da Polícia Militar</div>
            <div class="contact-details">
              Rua Professor João Antônio Rodrigues, 95, Vila Thaís<br>
              Telefone: 190 / (11) 4411-3789
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Cartório de Registro Civil</div>
            <div class="contact-details">
              Rua Zeferino Alves do Amaral, 239 – centro<br>
              Telefone (11) 4411-3102
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Cartório Eleitoral</div>
            <div class="contact-details">
              Rua José Ignácio, 329 – centro<br>
              Telefone (11) 4412-6136
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Câmara Municipal da Estância de Atibaia</div>
            <div class="contact-details">
              Av. Nove de Julho, 277-399 – Centro<br>
              Telefone: (11) 2119-1100
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Atenção Psicossocial – CAPS</div>
            <div class="contact-details">
              Estr. dos Pires, 77 – Caetetuba<br>
              Recepção: (11) 4411-1853
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Assistência Social</div>
            <div class="contact-details">
              Rua Joaquim José da Silva Xavier, nº 219, Vila Salles<br>
              Telefone: (11) 4412-3717
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Assistência Social Caetetuba</div>
            <div class="contact-details">
              Rua Gonçalves Dias, 265<br>
              Telefone: (11) 4402-4329
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Assistência Social Jardim Imperial</div>
            <div class="contact-details">
              Espaço na esquina do Terminal Rodoviário do Jardim Imperial<br>
              Telefone: (11) 4412-4614
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Assistência Social Portão</div>
            <div class="contact-details">
              Rua Prefeito Antônio da Cunha Leite, nº 3209, Portão<br>
              Telefone: (11) 4416-9183
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Assistência Social Tanque</div>
            <div class="contact-details">
              Praça Soldado Constitucionalista, s/n (prédio na antiga estação de trem)<br>
              Telefones: (11) 4416-1554 / 4413-1087
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Mulher – CRM</div>
            <div class="contact-details">
              Atende mulheres vítimas de violência de gênero<br>
              Rua Albertina Mieli Pires, nº 161, Jardim Brasil, CEP 12949-150<br>
              Fone: (11) 4402-2716<br>
              Atendimento: de segunda a sexta-feira, das 8h às 17h
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro de Referência da Mulher "Dirce Bellingeri"</div>
            <div class="contact-details">
              Atendimento à mulheres vítimas de violência de gênero<br>
              Rua Albertina Mieli Pires, nº 161, Jardim Brasil<br>
              Telefone: (11) 4402-2716<br>
              Atendimento: de segunda a sexta-feira, das 8h às 17h
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro Empresarial de Atibaia</div>
            <div class="contact-details">
              Av. Tégula, 888 – Pte. Alta, Atibaia – SP, 12952-820<br>
              Telefone: (11) 2119-1777
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Centro POP</div>
            <div class="contact-details">
              Rua Albertina Miéle Pires, nº 153, Centro (ao lado da Secretaria de Educação)<br>
              Telefones: (11) 4411-8087 / 4413-0974
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Comdecon</div>
            <div class="contact-details">
              Av. Brigadeiro José Vicente Faria Lima, 345, Centro, no Ganha Tempo
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Coordenadora Cidadania</div>
            <div class="contact-details">
              Av. da Saudade, 252 – Centro<br>
              (11) 4414-2448<br>
              cec@atibaia.sp.gov.br
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Coordenadoria Emprego e Renda</div>
            <div class="contact-details">
              (11) 4414-2141
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Coordenadoria Especial do Idoso</div>
            <div class="contact-details">
              (11) 4413-4749
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Corpo de Bombeiros</div>
            <div class="contact-details">
              Avenida Alfredo André, 295 – centro<br>
              Telefone: (11) 4418-2041 / 4412-7378
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Correios e Telégrafos</div>
            <div class="contact-details">
              Rua José Alvim, 346 – Centro<br>
              Telefone: (11) 4413-2843
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Defesa Civil</div>
            <div class="contact-details">
              Av. dos Bandeirantes, 445 – Vila Junqueira<br>
              (11) 4412-0671 / 4414-0419<br>
              defesacivil@atibaia.sp.gov.br
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Defesa Civil (Emergências)</div>
            <div class="contact-details">
              Avenida dos Bandeirantes, 445 – Balneário<br>
              Telefone (11) 4414-0420 – Emergências: 199
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Delegacia</div>
            <div class="contact-details">
              Avenida Alfredo André, 175 – centro<br>
              Telefone: (11) 4412-7714
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Denúncia contra crimes ambientais</div>
            <div class="contact-details">
              0800 61 8080
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Direitos e Defesa Animal</div>
            <div class="contact-details">
              Av. da Saudade, 252 – Centro<br>
              (11) 4413-3723 e 4413-6996
            </div>
          </div>
          <div class="contact-separator"></div>



          <div class="contact-item">
            <div class="contact-name">Elektro Eletricidade e Serviços</div>
            <div class="contact-details">
              Av. São João, 1815<br>
              Telefone: (11) 2119-4000 / 0800 701 01 02
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Espaço do Empreendedor</div>
            <div class="contact-details">
              Rua São Vicente de Paulo, 17 – 1º andar – Centro – Atibaia/SP<br>
              Fone: (11) 4414-0500<br>
              e-mail: empreendedor@atibaia.sp.gov.br
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Fórum de Atibaia</div>
            <div class="contact-details">
              Rua Napoleão Ferro, 315 – Alvinópolis<br>
              Telefone: (11) 4412-9688
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Fundo Social de Solidariedade</div>
            <div class="contact-details">
              Avenida Jerônimo de Camargo, 3890<br>
              Telefone 11 4412-8220<br>
              fundosocial@atibaia.sp.gov.br
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Ganha Tempo</div>
            <div class="contact-details">
              Av. Brigadeiro José Vicente Faria Lima, 345, Centro
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Guarda Municipal</div>
            <div class="contact-details">
              Rua Adolfo André, 1792 – Vila Rica<br>
              Telefone: 153 / 4413-0127
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Hospital Albert Sabin</div>
            <div class="contact-details">
              Rua Bahia, 342 – Recreio Estoril<br>
              Telefone: (11) 4414-5000
            </div>
          </div>
          <div class="contact-separator"></div>

          <div class="contact-item">
            <div class="contact-name">Hospital Novo Atibaia</div>
            <div class="contact-details">
              Rua Pedro Cunha, 145 – Vila Santista<br>
              Telefone: (11) 4414-6000
            </div>
          </div>
          <!-- Início da lista de contatos -->

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Laboratório Municipal de Patologia e Análises Clínicas</div>
            <div class="contact-details">
              Pça Santo Antonio, 110 – Fundos – Alvinópolis<br>
              Recepção: 4418-2079 / 2434
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Mercado Municipal</div>
            <div class="contact-details">
              Praça Aprígio de Toledo, 110 – Centro
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Mobilidade e Planejamento Urbano</div>
            <div class="contact-details">
              Estrada Municipal Juca Sanches, 868 – Jardim Brogotá<br>
              Telefone: (11) 4414-3950 / 4414-3953 (Fiscalização)<br>
              Email: transito@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Ouvidoria Geral do Município</div>
            <div class="contact-details">
              Rua São Vicente de Paula, nº 17 – Centro<br>
              Telefones: (11) 4414-2124 – 0800.77.33.996<br>
              Email: ouvidoria@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">PAT – Posto de Atendimento ao Trabalhador</div>
            <div class="contact-details">
              Avenida da Saudade, 287 – Centro – Atibaia – SP / CEP: 12940-560<br>
              Telefones: (11) 4414-2141 – (11) 4414-2072
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Prefeitura da Estância de Atibaia</div>
            <div class="contact-details">
              Avenida da Saudade, 252 – Centro<br>
              Telefone: (11) 4414-2000
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Prefeitura de Atibaia – Gabinete do Prefeito</div>
            <div class="contact-details">
              Av. da Saudade, 252 – Centro<br>
              Telefone: (11) 4414-2551
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Procuradoria-Geral do Município</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 31 – Vila Rica<br>
              Telefone: (11) 4414-2350<br>
              Email: juridico@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Registro de Imóveis e Anexos da Comarca de Atibaia</div>
            <div class="contact-details">
              Rua Castro Fafe, nº 255 – 2º andar – Centro – Atibaia – SP – CEP 12940-440<br>
              Telefone: (11) 4414-5550
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Rodoviária</div>
            <div class="contact-details">
              Praça Pedro de Toledo, s/n – Centro<br>
              Telefone: (11) 4411-2215
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Rota das Bandeiras</div>
            <div class="contact-details">
              Telefone: 0800-770-80-70
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">SAAE – Saneamento Ambiental de Atibaia</div>
            <div class="contact-details">
              Praça Roberto Gomes Pedrosa, 11 – Cidade Satélite<br>
              Telefone: (11) 4414-3500
            </div>
          </div>
          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Santa Casa</div>
            <div class="contact-details">
              Praça Miguel Vairo, 104 – Centro<br>
              Telefone: (11) 4411-0062
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Administração</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 100 – Vila Rica<br>
              Telefone: (11) 4414-2510<br>
              Email: administracao@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Agricultura</div>
            <div class="contact-details">
              Estrada Municipal Juca Sanches, 400 – Jardim Brogotá<br>
              Telefone: (11) 4414-3985<br>
              Email: saa@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Comunicação</div>
            <div class="contact-details">
              Av. da Saudade, 252 – Centro<br>
              Telefone: (11) 4414-2400<br>
              Email: jornalismo@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Cultura e Eventos</div>
            <div class="contact-details">
              Al. Lucas Nogueira Garcez, 511 – Vila Thaís<br>
              Centro de Convenções e Eventos Victor Brecheret<br>
              Telefone: (11) 4412-3287<br>
              Email: cultura@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Desenvolvimento Econômico</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 31 – Vila Rica<br>
              Telefones: (11) 4414-2300 / 2315 – 4414-2308 (Fiscalização)<br>
              Email: sedec@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Educação</div>
            <div class="contact-details">
              Rua Albertina Mielli Pires, 145 – Centro<br>
              Telefone: (11) 4414-3000<br>
              Email: educacao@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Esportes e Lazer</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 31 – Vila Rica<br>
              Telefone: (11) 4414-2270<br>
              Email: esportes@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Governo</div>
            <div class="contact-details">
              Av. da Saudade, 252 – Centro<br>
              Telefone: (11) 4414-2005
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Habitação de Interesse Social</div>
            <div class="contact-details">
              Praça Aprígio de Toledo, 130 – Centro<br>
              Telefone: (11) 4412-3246<br>
              Email: habitacao@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Meio Ambiente</div>
            <div class="contact-details">
              Av. Santana, 133 – Estância Lynce<br>
              Telefone: (11) 4414-5400
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Obras Públicas</div>
            <div class="contact-details">
              Av. Santana, 133 – Estância Lynce<br>
              Telefone: (11) 4414-5400<br>
              Email: urbanismo@atibaia.sp.gov.br
            </div>
          </div>
          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Planejamento e Finanças</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 100 – Vila Rica<br>
              Telefone: (11) 4414-2231<br>
              Email: financas@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Recursos Humanos</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 100 – Vila Rica<br>
              Telefone: (11) 4414-2242<br>
              Email: rh@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Saúde – Vigilância Sanitária</div>
            <div class="contact-details">
              Rua Bruno Sargiani, 100 – Vila Rica<br>
              Telefone: (11) 4414-2220 / 4414-3350 (Denúncias)<br>
              Email: secsaude@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Serviços</div>
            <div class="contact-details">
              Estrada Municipal Juca Sanches, 400 – Boa Vista<br>
              Telefone: (11) 4414-3950
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Secretaria de Turismo – Centro de Informações Turísticas</div>
            <div class="contact-details">
              Av. dos Bandeirantes, s/n, Parque das Águas<br>
              Atendimento de segunda a sábado, das 9h às 17h; domingos, das 9h às 13h.<br>
              Telefone: 4414-0400<br>
              Email: turismo@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">Segurança Pública</div>
            <div class="contact-details">
              Rua Adolfo André, 1792 – Vila Rica<br>
              Telefone: 153 / 4413-0127<br>
              Email: seguranca@atibaia.sp.gov.br
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">SOU Atibaia – Transporte Urbano</div>
            <div class="contact-details">
              Av. São João, 1397 – Parque das Nações<br>
              Telefone: (11) 4411-9990
            </div>
          </div>

          <!-- Unidades de Saúde -->

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Antonio de Pádua Alonso (Alvinópolis)</div>
            <div class="contact-details">
              R. Padre Feliciano Grande, 480 – Alvinópolis<br>
              Recepção: 4414-1350
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Dona Olívia Paulini Maziero (Campos dos Aleixos)</div>
            <div class="contact-details">
              Pátio da Festa do Morango, s/n – Campos dos Aleixos<br>
              Recepção: 4416-4861
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Dr. Benedito José Barbosa (Rosário)</div>
            <div class="contact-details">
              Rod. Fernão Dias Km 47 – Bairro do Rosário<br>
              Recepção: 4412-7509
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Dr. Herconides Martins de Oliveira (Usina)</div>
            <div class="contact-details">
              Estr. Hisaichi Takebayashi, 8.000 – Bairro da Usina<br>
              Recepção: 4416-4861
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Dr. Oswaldo Paccini (Centro)</div>
            <div class="contact-details">
              R. Castro Fafe, 201 – Centro<br>
              Recepção: 4414-6500
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Jarbas Pereira de Araújo (Maracanã)</div>
            <div class="contact-details">
              R. Joaquim Cintra Sobrinho s/n – Maracanã<br>
              Recepção: 4415-1282
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Majuca Macedo (Portão)</div>
            <div class="contact-details">
              R. Antonio da Cunha Leite, s/n – Portão<br>
              Recepção: 4416-6960
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Maria Anunciação Zeni Capodeferro (Tanque)</div>
            <div class="contact-details">
              Estr. Velha de Bragança Paulista, 2.450 – Bairro do Tanque<br>
              Recepção: 4416-1337
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Maria Ignácio Borges (Rio Acima)</div>
            <div class="contact-details">
              R. Maria Luiza Rocca Borges, s/n – Rio Acima<br>
              Recepção: 4415-1170
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Maria Pinpinato Dolci (Caetetuba)</div>
            <div class="contact-details">
              R. Califórnia, s/n – Jd. Cerejeiras<br>
              Recepção: 4418-2059
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UBS Sumico Ono (Alvinópolis Velho)</div>
            <div class="contact-details">
              Pça Santo Antonio, 110 – Alvinópolis<br>
              Recepção: 4418-2077 / 2070
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">UPA – Unidade de Pronto Atendimento – Cerejeiras</div>
            <div class="contact-details">
              Praça Oriente S/N – Jardim Cerejeiras<br>
              Telefone: (11) 4402-1953
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF Ana Nery (Jardim Imperial)</div>
            <div class="contact-details">
              R. Pacaembu s/n – Jardim Imperial<br>
              Recepção: 4413-0811 / 4418-2067
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF Caetetuba</div>
            <div class="contact-details">
              R. Tameyuki Nakasu, 123 – Caetetuba<br>
              Recepção: 4413-0844
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF Carmelina Silveira Cintra (Boa Vista)</div>
            <div class="contact-details">
              Estr. da Boa Vista, s/n – Centro Rural – Boa Vista<br>
              Recepção: 4494-8170
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF Farmacêutico Pompeu Miguel Vairo (Rio Abaixo)</div>
            <div class="contact-details">
              Fazenda Santa Izabel, s/n – Rio Abaixo<br>
              Recepção: 4416-4811
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF Flórido José Batista (Cachoeira)</div>
            <div class="contact-details">
              Estr. da Cachoeira, s/n – Cachoeira
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF Pedro Maturana (Cerejeiras)</div>
            <div class="contact-details">
              R. Washington Luis, 180 – Jardim Cerejeiras<br>
              Recepção: 4418-2065
            </div>
          </div>

          <div class="contact-separator"></div>
          <div class="contact-item">
            <div class="contact-name">USF São José</div>
            <div class="contact-details">
              R. Mantiqueira, s/n – Caetetuba<br>
              Recepção: 4412-0825
            </div>
          </div>

          <!-- Fim da lista de contatos -->


          <!-- Continuação no próximo bloco... -->

        </div>
      </section>
    </div>
  </main>

  <!-- Footer -->
  <?php

  require("partes/footer.php")

  ?>
</body>

</html>
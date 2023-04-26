<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gruta</title>

  <!-- ARQUIVO DE ESTILO DO PORTAL -->
  <link rel="stylesheet" type="text/css" href="http://localhost//portalValdomiro/css/pousada.css">

</head>

<body>
  <!--CABEÇALHO DA PAGINA INICIAL-->
  <header>
    <div class="imagem_logo">
      <div><img src="http://localhost//portalValdomiro/img/logo.png"></div>
    </div>
    <nav>
      <ul>
        <li><a href="http://localhost//portalValdomiro/">Início</a></li>
        <li><a href="http://localhost//portalValdomiro/admin/perfil/perfil.php">Perfil</a></li>
        <li><a href="http://localhost//portalValdomiro/admin/pousadas/pousadas.php">Pousadas</a></li>
        <li><a href="http://localhost//portalValdomiro\admin\deliverys\deliverys.php">Deliverys </a></li>
      </ul>
    </nav>
    <h1>Presidente Figueiredo</h1>
  </header>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Reserva de Pousadas</title>
  </head>

  <body>
    <h1>Reserva de Pousadas</h1>
    <form action="processar_reserva.php" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required><br>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required><br>

      <label for="telefone">Telefone:</label>
      <input type="tel" id="telefone" name="telefone" required><br>

      <label for="tipo_quarto">Pousada:</label>
      <select id="pousada" name="pousada">
        <option value="pousada_tucanos">Pousada Tucanos</option>
        <option value="local_hostel">Local Hostel</option>
        <option value="pousada_1_lugar">Pousada 1 lugar</option>
      </select>

      <label for="data_chegada">Data de Chegada:</label>
      <input type="date" id="data_chegada" name="data_chegada" required><br>

      <label for="data_saida">Data de Saída:</label>
      <input type="date" id="data_saida" name="data_saida" required><br>

      <label for="tipo_quarto">Tipo de Quarto:</label>
      <select id="tipo_quarto" name="tipo_quarto">
        <option value="solteiro">Solteiro</option>
        <option value="casal">Casal</option>
        <option value="duplo">Duplo</option>
      </select><br>

      <label for="num_quartos">Número de Quartos:</label>
      <input type="number" id="num_quartos" name="num_quartos" min="1" max="5" required><br>

      <label for="comentarios">Comentários:</label><br>
      <textarea id="comentarios" name="comentarios" rows="5" cols="50"></textarea><br>

      <input type="submit" value="Reservar">
      <input type="reset" value="Limpar">
    </form>
  </body>

  </html>

</html>
<?php
$seat = null;

if (isset($_POST['name-seats']))

$seat = $_POST['name-seats'];

if ($seat !== null)

for ($i = 0; $i < count($seat); $i++)

//exibimos o valor atual na tela
echo "<p>Poltronas: {$seat[$i]}</p>";

echo "Data: " .$_POST['data-sessao'];
echo "<br>";
echo "Horario: " .$_POST['horario-sessao'];
echo "<br>";
echo "Filtrar por: ".$_POST['categoria-produto'];
echo "<br>";
echo "Nome pagamento: ".$_POST['card-name'];
echo "<br>";
echo "Numero cartao: ".$_POST['card-number'];
echo "<br>";
echo "Vencimento: ".$_POST['expiry-date'];
echo "<br>";
echo "CVV: ".$_POST['card-back-cvv'];
echo "<br>";
echo "Tipo Cartao: ".$_POST['tipo_cartao'];
echo "<br>";
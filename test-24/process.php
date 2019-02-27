<?php

if ( !file_exists('conn.php') ) { die('KO-1'); }
require 'conn.php';



/*
$sql = "SELECT `nome`, `importo`, `data`, `tipo` FROM (
        SELECT `cliente_id`, `pagamento_id`, `data`, `importo` FROM `fatture`
        UNION ALL
        SELECT `cliente_id`, `pagamento_id`, `data`, `importo` FROM `notecredito`
        UNION ALL
        SELECT `cliente_id`, `pagamento_id`, `data`, `importo`  FROM `parcelle`
      ) AS `temp`
      JOIN `clienti` ON temp.cliente_id = clienti.id
      JOIN `pagamenti` ON temp.pagamento_id = pagamenti.id
      WHERE temp.pagamento_id = 2 AND temp.cliente_id = 8 AND YEAR(temp.data) BETWEEN 1990 AND 2019
      ORDER BY temp.data DESC";
*/
$sql = "SELECT * FROM `clienti`";

if (!$result = $conn->query($sql)) { die('KO-2'); }

$rows = $result->fetch_all(MYSQLI_ASSOC);

$arr = [];

foreach ($rows as $row) {

    if ($row["id"] == 3)  {// "selected": true

        $text = $row["nome"] . ' - ' . $row["data"] . ' - ' . $row["provincia"];
        $arr[] = [ "id" => $row["id"], "text" => $text, "selected" => true ];
    } else {

        $text = $row["nome"] . ' - ' . $row["data"] . ' - ' . $row["provincia"];
        $arr[] = [ "id" => $row["id"], "text" => $text ];
    }
}
/*
$row_count = $result->num_rows;
echo $row_count;

$status = explode('  ', $conn->stat());
echo '<pre>';print_r($status);echo '</pre>';

echo '<pre>';print_r($rows);echo '</pre>';
*/


$result->close();

$conn->close();



die(JSON_encode($arr));
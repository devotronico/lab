<?php

$conn = new mysqli('localhost', 'root', '', 'db_gestionale');

if ($conn->connect_error) {
    die('Errore di connessione (' . $conn->connect_errno . ') '
    . $conn->connect_error);
}
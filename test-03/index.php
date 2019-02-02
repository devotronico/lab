<?php
echo "<h1><a href='/LAB/index.php'><</a>&nbspTEST-03</h1>";
/*
$user = new StdClass();
$user->name = 'Daniele';
$user->age = 35;
$user->hobby = ['coding', 'travelling'];
$user->isAvailable = true;
$user->money = null;
 */

$user1 = ["name" => "Daniele", "email" => "dan@mail.it", "password" => "123456789"];
$user2 = ["name" => "Nicola", "email" => "nic@mail.it", "password" => "987654321"];

$user[] = $user1;
$user[] = $user2;

$str = json_encode($user);

echo '<pre>';
print_r($user); // object(stdClass)
echo $str; // {"name":"Daniele","age":35,"hobby":["coding","travelling"],"isAvailable":true,"money":null}

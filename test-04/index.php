<?php
echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-04</h1>";
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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<script>


const dati = '[{"name":"Daniele","email":"dan@mail.it","password":"123456789"},{"name":"Nicola","email":"nic@mail.it","password":"987654321"}]';

let obj = JSON.parse(dati);

console.log(obj); //

let json = JSON.stringify(obj);

console.log(json); //

for ( let i=0; i<obj.length; i++ ) {
    console.log(obj[i].name); //
    console.log(obj[i].email); //
    console.log(obj[i].password); //
}

let arr = [{name: "Daniele", email: "dan@mail.it", password: "123456789"},{name: "Nicola", email: "nic@mail.it", password: "123456789"}];


console.log(typeof arr);

</script>
</body>
</html>

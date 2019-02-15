<?php

echo "<h1><a href='/workspace/LAB/index.php'><</a>&nbspTEST-02</h1>";

/**
 * Passa un array di valori al costruttore della classe
 * e ritorna un array di array che viene convertito in una stringa json
 */
class Test
{
    private $data;
    private $message = [];

    public function __construct(array $data)
    {

        $this->data = $data;
/*
foreach ($this->data as $key => $value) {
//  print "key: $key => value: $value";

switch ($key) {
case "name":$this->validateName($value);
break;
case "email":$this->validateEmail($value);
break;
case "password":$this->validatePassword($value);
break;

}
}

if (!empty($this->message)) {return json_encode($this->message);}

return false;*/
    }

    private function validateName($name)
    {
        //  $this->message .= '{ "status": "error", "error": "name", "message": "Il campo nome è vuoto" }';
        $this->message[] = ["status" => "error", "error" => "name", "message" => "Il campo nome è vuoto"];
        //  return true;
    }

    private function validateEmail($email)
    {
        // $this->message .= "email ok<br>";
        $this->message[] = ["status" => "error", "error" => "email", "message" => "Il campo email è vuoto"];
        // return true;
    }

    private function validatePassword($password)
    {
        // $this->message .= "password ok<br>";
        $this->message[] = ["status" => "error", "error" => "email", "message" => "Il campo email è vuoto"];
        // return true;
    }

    public function validate()
    {
        foreach ($this->data as $key => $value) {
            //  print "key: $key => value: $value";

            switch ($key) {
                case "name":$this->validateName($value);
                    break;
                case "email":$this->validateEmail($value);
                    break;
                case "password":$this->validatePassword($value);
                    break;

            }
        }

        if (!empty($this->message)) {return json_encode($this->message);}

        return false;
    }

}

$name = "Daniele";
$email = "dan@mail.it";
$password = "0123456789";

$test = new Test(
    [
        "name" => $name,
        "email" => $email,
        "password" => $password,
    ]
);
$str = $test->validate();

//$test = Test(["name" => $name, "email" => $email, "password" => $password])::validate();

$obj = json_decode($str);

foreach ($obj as $key => $value) {

    echo "key: $key => value: $value->status<br>";
    echo "key: $key => value: $value->error<br>";
    echo "key: $key => value: $value->message<br>";

}

// echo $test->getMessage();

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" href="style.css">
    <title>Select 2 Library</title>
</head>
<body>
    <div class="container">

    <button type="button" class="js-programmatic-enable">Enable</button>
    <button type="button" class="js-programmatic-disable">Disable</button>
        <div class="box">
        <select class="example-1" name="state1" style="width: 40%">
        <option value="AL">Alabama</option>
        <option value="NA">Napoli</option>
        <option value="WY">Wyoming</option>
        </select>

        <select class="example-2" name="state2" style="width: 40%">
        <option value="AL">Alabama</option>
        <option value="NA">Napoli</option>
        <option value="WY">Wyoming</option>
        </select>
        </div>
        <div class="box">
        <select class="example-3" name="state3" style="width: 40%"></select>

        <select class="example-4" name="state4" style="width: 40%"></select>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
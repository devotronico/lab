$(document).ready(function() {






        $('.example-1').select2();



        $('.example-2').select2({
            placeholder: 'Select an option'
          });


        // $('.example-3').select2({
        //     placeholder: 'Select an option'
        //   });

          $('.example-3').select2({
            placeholder: {
              id: '-1', // the value of the option
              text: 'Seleziona un opzione'
            }
          });





          $(".js-programmatic-enable").on("click", function () {
              
            $(".example-1").prop("disabled", false);
            $(".example-2").prop("disabled", false);
          
          });

          $(".js-programmatic-disable").on("click", function () { console.log("disable");
              
            $(".example-1").prop("disabled", true);
            $(".example-2").prop("disabled", true);
          
          });



const init = function(){

    request();
}

init();


const addOptions = function(data) { console.log("TEST-1");

/*
          var data = [
            {
                id: 0,
                text: 'enhancement'
            },
            {
                id: 1,
                text: 'bug'
            },
            {
                id: 2,
                text: 'duplicate'
            },
            {
                id: 3,
                text: 'invalid'
            },
            {
                id: 4,
                text: 'wontfix'
            }
        ];
*/
        $(".example-4").select2({
          data: data
        })

    }







    
function request(data=null){

const xhttp = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

xhttp.onreadystatechange = function() {

    switch ( this.readyState ) {

        case 0: console.log("readyState 0: "+xhttp.readyState); break;

        case 1: console.log("readyState 1: "+xhttp.readyState); break;

        case 2: console.log("readyState 2: "+xhttp.readyState); break;

        case 3: console.log("readyState 3: "+xhttp.readyState); break;

        case 4: console.log("readyState 4: "+xhttp.readyState);

            if (this.status >= 200 && this.status < 300) {

                let str = xhttp.responseText;  console.log(str);

                let obj = JSON.parse(str);   //console.log(obj);

                addOptions(obj);

            } else {

            }
    break;
    }
};
xhttp.open("POST", "process.php", true);
xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhttp.send(data);
}







});









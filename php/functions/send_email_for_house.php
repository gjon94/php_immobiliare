<?php
if($_SERVER["REQUEST_METHOD"] === 'POST' ){
    var_dump($_POST);

    ///inputs
    $house_id = htmlspecialchars($_POST["house_id"]);
    $select_value = htmlspecialchars($_POST["select_value"]);
    $sender_name = htmlspecialchars($_POST["name"]);
    $sender_email = htmlspecialchars($_POST["email"]);
    $sender_phone = htmlspecialchars($_POST["phone"]);


    switch($select_value){
        case 0:
            $select_value="Richiesta contattatto";
            break;
        case 1:
            $select_value="Maggiori info";
            break;
        case 2:
            $select_value="Richiesta appuntamento";
            break;
        default:
            $select_value="Richiesta contattatto";  
    }


    ///qui andro a prendwere la mail dell'agenzia
    $destinatario = "gjongjoka94@hotmail.it";

    ///email server immobiliare
    $mittente = "gjongjokaeu@gmail.com";

    $oggetto = "ciao dai immobili";
    $home_url = 'http://' . $_SERVER['HTTP_HOST'];

    $corpo = "<html>
    <body>
    <h5>Interessato a  :  $select_value</h5>
    <a href='$home_url/immobiliare/views/house.php?house_id=$house_id' >vai alla casa </a>
    <h5>da: $sender_email</h5>
    <h5>nome: $sender_name</h5>
    <h5>tel: $sender_phone</h5>
    </body>
    </html>";


    $mail_in_html = "MIME-Version: 1.0\r\n";
    $mail_in_html .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $mail_in_html .= "From: <$mittente>";

    

    

if (mail($destinatario, $oggetto, $corpo, $mail_in_html))
{
print "Inviata correttamente a $destinatario";
}
else
{

print "Problemi di invio";
}


}
?>
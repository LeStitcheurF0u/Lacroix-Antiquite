<?php

    if(isset($_SERVER['HTTP_ORIGIN'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['raison']) && empty($_POST['raison'])){
                if(!preg_match('!^ *$!s', $_POST['nom']) && !preg_match('!^ *$!s', $_POST['prenom']) && !preg_match('!^ *$!s', $_POST['mail']) && !preg_match('!^ *$!s', $_POST['sujet']) && !preg_match('!^ *$!s', $_POST['message'])){
                    $mailMail = htmlspecialchars($_POST['mail']);
                    $mailTo = "mcfly@mywebsoluce.fr";

                    $mailNom = htmlspecialchars($_POST['nom']);
                    $mailPrenom = htmlspecialchars($_POST['prenom']);
                    $mailSujet = htmlspecialchars($_POST['sujet']);
                    $mailContent = htmlspecialchars($_POST['message']);

                    $to ="$mailTo";
                    $from = "$mailNom $mailPrenom";

                    $subject = "Contact web : $mailSujet";
                    $message = "<style>
                                *{
                                    margin: 0;
                                    padding: 0;
                                    box-sizing: border-box;
                                    font-size: 1.2em;
                                    font-family: 'ubuntu', verdana, 'sans-serif';
                                }

                                body{
                                    min-height: 70vh;
                                    background: #E4E9F7;
                                    display: flex;
                                    flex-flow: column nowrap;
                                    justify-content: space-between;
                                    align-items: center;
                                    overflow: hidden;
                                }
                                .header {
                                    position: relative;
                                    width: 100%;
                                    height: 10vh;
                                    background: #29282d;
                                    display: flex;
                                    flex-flow: row no-wrap;
                                    justify-content: space-around;
                                    align-items: center;
                                }
                                .header h1{
                                    position: absolute;
                                    left: 30px;
                                    font-size: 24px;
                                    font-weight: bold;
                                    font-style:  italic;
                                    text-align: center;
                                    color: #FFF;
                                }
                                .mail-content{
                                    position: relative;
                                    width: 98%;
                                    height: auto;
                                    margin-top: 30px;
                                    display: flex;
                                    flex-flow: column nowrap;
                                    align-items: flex-start;
                                    justify-content: center;
                                    border: 2px dashed #f66717;
                                    border-radius: 10px;
                                }
                                p{
                                    display: flex;
                                    flex-flow: row wrap;
                                    justify-content: flex-start;
                                    align-items: center;
                                    margin: 1rem;
                                    letter-spacing: 2px;
                                    line-height: 15px;
                                }
                                span{
                                    font-weight: bold;
                                    color: #f66717;
                                    margin: 10px;
                                }
                                                                        
                                </style>
                                <div class='header'>
                                    <h1>Nouveau contact mail</h1>  
                                </div>
                                <div class='mail-content'>
                                    <p>Bonjour,</p>

                                    <p><span> $mailNom $mailPrenom</span> vous a envoyé un message.</p>
                                    <p><span>Son mail</span> : $mailMail</p>

                                    <p><span>Le sujet de son message :</span> $mailSujet</p>
                                    <p><span>Son message :</span> $mailContent</p>

                                    <p>Vous pouvez répondre à son message en répondant directement à ce mail</p>
                                </div>
                                <footer>
                                    <div>
                                    </div>
                                </footer>
                                ";

                                $headers ="from : webmaster@lacroix-antiquite.com" . "\r\n" .
                                'Reply-To: ' . $mailMail . "\r\n" . 
                                'X-Mailer : PHP/' . phpversion() . "\r\n" . 
                                "Content-Type: text/html; charset=UTF-8";

                                mail($to, $subject, $message, $headers);

                                echo '<script>
                                alert("Merci de votre mail, j\'y répondrais dans les plus brefs délais.");        
                                </script>';
                                header('location: ../contact.html');
                } else {
                    echo '<script>
                    alert("Une erreur s\'est produite, Veuillez essayer de nouveau.");        
                    </script>';
                    header('location: ../contact.html');
                }
            } else {
                http_response_code(405);
                echo 'echo Requête non autorisée !';
            }
        }
    }

?>
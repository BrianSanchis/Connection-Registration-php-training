    <?php
        require_once('../db/db_connect.php');
        //check if the var exists
        if(isset($_POST["username"], $_POST["mail"], $_POST["password"], $_POST["confPass"])){

            $username = $_POST["username"];
            $mail = $_POST["mail"];
            $pass = $_POST["password"];
            $confPass = $_POST["confPass"];

            //check if the input are not empty
            if(!empty($username) && !empty($mail) && !empty($pass) && !empty($confPass)){

                //ON NEUTRALISE LES BALISES HTML POUR EVITER LES XSS
                $usernameProtect = strip_tags($username);

                //check if the pass if the same than the conf pass
                if($pass == $confPass){

                    $passLen = strlen($pass);

                    //check the len of pass
                    if($passLen > 8 && $passLen < 50){

                        //create salt and hash pass
                        $salt = uniqid(mt_rand(), true);
                        $passSalted = $salt.$pass;
                        $passHashed = hash("sha256", $passSalted);

                        $query = "INSERT INTO users (username, email, password) VALUES ('$usernameProtect', '$mail', '$passHashed')";
                        if ($conn->query($query) === TRUE) {
                            echo "Inscription réussie !";
                        } 
                        else{
                        echo "Erreur lors de l'inscription : " . $conn->error;
                        }
                        
                        header("Location: connexion.php");
                    }
                    else{
                        //error msg if the pass is to short or to tall
                        if($passLen < 8){
                            $errorShort = "Le mdp est trop petit";
                        }
                        elseif($passLen > 50){
                            $errorTall = "Le mdp est trop grand";
                        }
                    }
                }
                else{
                    $errorConf = "Les mots de passe ne sont pas identique";
                }
            }
            else{
                $errorEmpty = "Certains champs sont vides";
            }
        }
        else{
            $errorServ = "Erreur du serveur";
        }
    ?>
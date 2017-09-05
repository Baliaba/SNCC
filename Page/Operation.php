<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SOS HONEYWELL</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="style/jquery-ui-1.9.2.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Entete.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Pied.css"/>
    <link rel="stylesheet" type="text/css" href="include/style/Fenetre_Modal.css"/>
    <link rel="stylesheet" type="text/css" href="style/Operation.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <?php require_once 'include/Entete.php'; ?>
                <br/>
                <?php require_once 'include/Menu.php'; ?>
                
                <div class="row" id="Div_Content">
                    <div class="col-md-12" id="Div_View">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div id="Accordeon" class="panel-group col-md-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <a class="accordion-toggle" href="#Div_Sos" data-parent="#Accordeon" data-toggle=""> 
                                                    SOS HONEYWELL
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="Div_Sos" class="panel-collapse collapse in">
                                            <div class="panel-body"> 
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-8">
                                                        <form method="post" action="" id="Form_Sos">
                                                            <table border="0" width="100%">
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="form-group">
                                                                            <label for="Txt_Piece_Defaillante">Nom de la pièce défaillante : </label>
                                                                            <input type="text" name="Txt_Piece_Defaillante" id="Txt_Piece_Defaillante" class="form-control input-sm" autocomplete="off"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <label for="Txt_Numero_Serie">Numéro de série : </label>
                                                                            <input type="text" name="Txt_Numero_Serie" id="Txt_Numero_Serie" class="form-control input-sm" autocomplete="off"/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <label for="Txt_Modele">Modèle : </label>
                                                                            <input type="text" name="Txt_Modele" id="Txt_Modele" class="form-control input-sm" autocomplete="off"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <label for="Txt_Numero_Garantie">Numéro de garanti : </label>
                                                                            <input type="text" name="Txt_Numero_Garantie" id="Txt_Numero_Garantie" class="form-control input-sm" autocomplete="off"/>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <label for="Txt_Contact_Exp">Contact de l'expéditeur : </label>
                                                                            <input type="text" name="Txt_Contact_Exp" id="Txt_Contact_Exp" class="form-control input-sm" autocomplete="off"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="form-group">
                                                                            <label for="Txt_Commentaire">Commentaire : </label>
                                                                            <textarea name="Txt_Commentaire" id="Txt_Commentaire" class="form-control input-sm"></textarea>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="form-group">
                                                                            <label for="Txt_Email_Honeywell">Email Honeywell : </label>
                                                                            <input type="text" name="Txt_Email_Honeywell" id="Txt_Email_Honeywell" class="form-control input-sm" autocomplete="off"/>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <input type="submit" class="btn btn-primary" id="Btn_Send_Email" value="ENVOYER L'EMAIL"/>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php require_once 'include/Pied.php'; ?>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'include/Fenetre_Modale.php'; ?>
    
    <script type="text/javascript" src="script/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="script/jquery-ui-1.9.2.js"></script>
    <script type="text/javascript" src="script/jquery.form.min.js"></script>
    <script type="text/javascript" src="script/datepicker.js"></script>
    <script type="text/javascript" src="script/My/Operation.js"></script>
    <script type="text/javascript" src="script/My/Fenetre_Modal.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SNCC</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta  charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Page/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="Page/Style/Index.css"/>
 </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="Main">
                <div class="row" id="Alert_Msg">
                    <div class="alert alert-success alert-dismissable col-md-12">
                        <button type="button" class="close" datadismiss="alert">&times; </button>
                        <span class="Alert_Text"></span>
                    </div>
                </div>
                
                <div id="Accordeon" class="panel-group col-md-offset-3 col-lg-5">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle" href="#Div_Authentification" data-parent="#Accordeon" data-toggle="collapse"> 
                                    AUTHENTIFICATION
                                </a>
                            </h3>
                        </div>
                        <div id="Div_Authentification" class="panel-collapse collapse">
                            <div class="panel-body"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" action="" id="Form_Login">
                                            <div class="form-group">
                                                <label for="User_Name">Nom d'utilisateur : </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                                    <input type="text" class="form-control" name="Txt_User_Name" id="Txt_User_Name" placeholder="" 
                                                           style="margin-top: 1px;"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">Mot de passe : </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                                                    <input type="password" class="form-control" name="Txt_Password" id="Txt_Password" placeholder="" 
                                                           style="margin-top: 1px;"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" name="Remember_Me" id="Remember_Me" />
                                                <label for="Remember_Me">Se souvenir de moi </label>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-embossed" id="Btn_Login">CONNEXION</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a class="accordion-toggle" href="#Div_Inscription" data-parent="#Accordeon" data-toggle="collapse"> 
                                    INSCRIPTION 
                                </a>
                            </h3>
                        </div>
                        <div id="Div_Inscription" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" action="" id="Form_Inscription">
                                            <div class="form-group">
                                                <label for="Txt_Ins_Full_Name">Nom et Prénom : </label>
                                                <input type="text" class="form-control" name="Txt_Ins_Full_Name" id="Txt_Ins_Full_Name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="Txt_Ins_User_Name">Nom d'utilisateur : </label>
                                                <input type="text" class="form-control" name="Txt_Ins_User_Name" id="Txt_Ins_User_Name" placeholder="Ex: lam@sncc.archi" />
                                            </div>
                                            <div class="form-group">
                                                <label for="Combo_Poste_User">Sélectionner votre poste : </label>
                                                <div class="input-group" style="width:100%;">
                                                    <select name="Combo_Poste_User" id="Combo_Poste_User" class="form-control">
                                                        <option value="0">Choisir un poste</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Combo_Groupe_User">Groupe de l'utilisateur : </label>
                                                <div class="input-group" style="width:100%;">
                                                    <select name="Combo_Groupe_User" id="Combo_Groupe_User" class="form-control">
                                                        <option value="0">Choisir un groupe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Txt_Ins_Password">Mot de passe : </label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="Txt_Ins_Password" id="Txt_Ins_Password" />
                                                    <span class="input-group-addon" id="Password_NbLetter">00</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Confirm_Ins_Password">Confirmation Mot de passe : </label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" name="Confirm_Ins_Password" id="Txt_Confirm_Ins_Password" />
                                                    <span class="input-group-addon" id="Confirm_Password_NbLetter">00</span>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-embossed" id="Btn_Ins_Save">ENREGISTRER</button>
                                            <button type="reset" class="btn btn-danger btn-embossed pull-right" id="Btn_Ins_Cancel">ANNULER</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="Page/script/jquery-1.11.2.js"></script>
    <script type="text/javascript" src="Page/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="Page/script/My/Index.js"></script>
</body>
</html>
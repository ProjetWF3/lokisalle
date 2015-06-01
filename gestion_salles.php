<?php
//fichier de configuration
$pathConf = "./application/config/config.php";
if(file_exists($pathConf)) include_once($pathConf);

// on inclut le header
include_once("./application/theme/header.php"); 

// gestion de l'inscription
$msg = '';

  $contenu = '<div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">'.$bouton.' un produit</h3>
          </div>
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data" role="form">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="id_article" value="'.$id_article.'">
                    <input type="text" name="reference" id="reference" class="form-control input-sm" maxlength="10" placeholder="Réference" 
                    value="'.$reference. '">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="categorie" id="categorie" class="form-control input-sm" placeholder="Catégorie" value="'.$categorie.'">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="titre" id="titre" class="form-control input-sm" placeholder="Titre" value="'.$titre.'">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="text" name="couleur" id="couleur" class="form-control input-sm" placeholder="Couleur" value="'.$couleur.'">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <textarea name="description" id="description" class="form-control input-sm" placeholder="Description">'.$description.'</textarea>
              </div>
              
              <div class="form-group">
              '.$affichagePhoto.'
                <input type="file" name="photo" id="photo" class="form-control" >
              </div>

               <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group">
                    <select name="taille" id="taille" class="form-control input-sm" >
                      <option value="xl" '.$tailleXL.' >XL</option>
                      <option value="l" '.$tailleL.' >L</option>
                      <option value="m" '.$tailleM.' >M</option>
                      <option value="s" '.$tailleS.' >S</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group">
                    <input type="text" name="prix" id="prix" class="form-control input-sm" placeholder="Prix" value="'.$prix.'">
                  </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                  <div class="form-group">
                    <input type="text" name="stock" id="stock" class="form-control input-sm" placeholder="Stock" value="'.$stock.'">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input id="femme" type="radio" name="sexe" value="f" '.$sexeF.'>
                    </span>
                    <label for="femme" class="form-control">Femme</label>
                  </div><!-- /input-group -->
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input id="homme" type="radio" name="sexe" value="m" '.$sexeM.'>
                    </span>
                    <label class="form-control" for="homme" >Homme</label>
                  </div>
                </div>
              </div>

              <button style="margin-top: 15px;" type="submit" class="btn btn-info btn-block">'.$bouton.'</button>

            </form>
          </div>
        </div>
      </div>
    </div>'; }
   else {
    $contenu = '<div class="row">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
    <table class="table table-border table-hover">
    '. $titres . $donnees . '
    </table>
    </div>
  </div>';
  }
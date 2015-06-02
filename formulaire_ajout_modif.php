<div class="row centered-form">
      <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $bouton; ?> d'une salle</h3>
          </div>
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data" role="form" action="formulaire_ajout.php">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="id_salle" value="<?php echo $id_salle; ?>">
                    <label id="label-reference" class="label-inscription">Référence</label>
                    <input type="text" name="reference" id="reference" class="form-control input-sm" maxlength="10" value="<?php echo (!empty($_POST['reference'])) ? $_POST['reference'] : '';  ?>">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Catégorie</label>                    
                    <input type="text" name="categorie" id="categorie" class="form-control input-sm" value="<?php echo (!empty($_POST['categorie'])) ? $_POST['categorie'] : '';  ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Titre</label>                     
                    <input type="text" name="titre" id="titre" class="form-control input-sm" value="<?php echo (!empty($_POST['titre'])) ? $_POST['titre'] : '';  ?>">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Capacite</label> 
                    <input type="text" name="capacite" id="capacite" class="form-control input-sm" value="<?php echo (!empty($_POST['capacite'])) ? $_POST['capacite'] : '';  ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Pays</label>                    
                    <input type="text" name="pays" id="pays" class="form-control input-sm" value="<?php echo (!empty($_POST['pays'])) ? $_POST['pays'] : '';  ?>">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Ville</label>                       
                    <input type="text" name="ville" id="ville" class="form-control input-sm" value="<?php echo (!empty($_POST['ville'])) ? $_POST['ville'] : '';  ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Code Postal</label>                    
                    <input type="text" name="cp" id="cp" class="form-control input-sm" value="<?php echo (!empty($_POST['cp'])) ? $_POST['cp'] : '';  ?>">
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                    <label id="label-reference" class="label-inscription">Adresse</label>                       
                    <input type="text" name="adresse" id="adresse" class="form-control input-sm" value="<?php echo (!empty($_POST['adresse'])) ? $_POST['adresse'] : '';  ?>">
                  </div>
                </div>
              </div>                              

              <div class="form-group">
                <label id="label-reference" class="label-inscription">Description</label>                        
                <textarea name="description" id="description" class="form-control input-sm" alue="<?php echo (!empty($_POST['description'])) ? $_POST['description'] : '';  ?>"></textarea>
              </div>
              
              <div class="form-group">
              Photo
                <input type="file" name="photo" id="photo" class="form-control" >
              </div>

              <button style="margin-top: 15px;" type="submit" class="btn btn-info btn-block">Ajouter</button>

            </form>
          </div>
        </div>
      </div>
    </div>
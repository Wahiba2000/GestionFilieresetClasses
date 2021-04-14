<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>
    <div class="container-fluid">
        <div style="background-color:#394B50;" " class="card-header card-color">
                <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des classes</p>
            </div>
            <div class="card-body container-fluid" >
                <div class="row">
                    <div class="col-sm-6 mb-2">
                        <label for="code">Code : </label>
                        <input class="" type="text" id="id" hidden>
                        <input class="form-control" type="text" id="code" required>

                    </div>
                    <div class="col-sm-6 mb-2">
                        <label for="nom">Libelle : </label>
                        <select class="form-control" id="nom" required>
                            <?php
                            include_once 'beans/Filieree.php';
                            include_once 'services/FiliereeService.php';

                            $var1 = new FiliereeService();

                            foreach ($var1->findAlll() as $filiere) {
                                ?>
                                <option value="<?php echo $filiere->getId() ?>" name="<?php echo $filiere->getCode() ?>"><?php echo $filiere->getCode() ?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline-success mt-3 mb-3" id="btn">Ajouter</button>
                    </div>
                </div>
                <div class="row table-responsive m-auto rounded">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-uppercase bg-light">
                                <th scope="col">Id</th>
                                <th scope="col">Code</th>
                                <th scope="col">Code_Filiere</th>
                                <th scope="col">Supprimer</th>
                                <th scope="col">Modifier</th>
                            </tr>
                        </thead>
                        <tbody id="table-content">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="script/classe.js" type="text/javascript"></script>
    <?php
} else {
    header("Location: ../index.php");
}
?>

<?php auth(1); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<?= Alerts::getFlash(); ?>
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="float-left mb-0">Liste des inscriptions d'écoles</h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrumb-right">
                    <div class="dropdown">
                        <button type="button" class="btn-icon btn btn-primary btn-round btn-sm" data-toggle="modal" data-target="#add">
                            <i data-feather="plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
									<tr>
										<th>#</th>
										<th>NOM</th>
										<th>Prénom</th>
										<th>Adresse email</th>
										<th>École</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($inscriptions as $inscrit) { ?>
									<tr>
										<td><?= $inscrit['id_ins']; ?></td>
										<td><?= $inscrit['nom']; ?></td>
										<td><?= $inscrit['prenom']; ?></td>
										<td><?= $inscrit['email']; ?></td>
										<td><?= $inscrit['ecole']; ?></td>
										<td>
											<a class="btn btn-danger font-weight-bolder" href="inscriptions_ecoles&id_ins=<?= $inscrit['id_ins']; ?>" onclick="return(confirm('Voulez-vous vraiment supprimer cet élève ?'));">
                                                <i data-feather="x"></i>
                                            </a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
                            </table>
                        </div>
                    </div>
					<div class="d-flex justify-content-center">
						<form method="post" action="">
							<button type="submit" name="delete" class="btn btn-danger fs-lg active mb-3" onclick="return(confirm('Voulez-vous vraiment supprimer toutes les inscriptions ?'));">
								Supprimer toutes les inscriptions
							</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ajouter une inscription</h4>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                	<?= $forms->input('nom', 'Nom', 'text', 'nom') ?>
	        		<?= $forms->input('prenom', 'Prénom', 'text', 'prenom') ?>
	        		<?= $forms->input('email', 'Adresse email', 'email', 'email') ?>
					<div class="form-group">
						<label for="ecole" class="form-label">Nom de l'école</label>
                        <select name="ecole" class="form-control">
                            <?php $requete = $bdd->query("SELECT * FROM ecoles ORDER BY nomec");
                            $lesEcoles = $requete->fetchAll();
                            foreach ($lesEcoles as $uneEcole) { ?>
                            <option value="<?= $uneEcole['nomec'] ?>"><?= $uneEcole['nomec'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

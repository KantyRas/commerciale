<div class="row">

    <?php foreach ($depts as $dept): ?>
    <div class="col-lg-4">
        <a href="<?php echo base_url('Departement/departement')?>?iddepartement=<?php echo $dept['idDepartement']?>">
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold"><?php echo $dept['nomDepartement']?></h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                            Nombre employé : <h4 class="fw-semibold mb-3"><?php echo $dept['nombreEmployes']?></h4>
                            Salaire : <h4 class="fw-semibold mb-3"><?php echo $dept['salaireTotal']?> Ar</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; ?>

</div>




</div>
</div>
</div>
</body>
</html>

<form class="row g-3" action="<?php echo base_url('Achat/ajout')?>" method="get">
    <input type="hidden" name="idfournisseur" value="<?php echo $idf;?>">
    <div class="article-entry col-md-3 mt-3">
        <label for="iddept" class="form-label">Departement</label>
        <select class="form-control" name="iddept">
            <?php foreach ($depts as $dept):?>
                <option value="<?php echo $dept['idDepartement']?>">
                    <?php echo $dept['nomDepartement']; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="num" class="form-label">nºfacture</label>
        <input type="text" class="form-control" name="num">
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="datefacture" class="form-label">date</label>
        <input type="date" class="form-control" name="datefacture">
    </div>

    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>



</div>
</div>
</div>
</body>
</html>

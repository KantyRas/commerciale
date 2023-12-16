<table class="table">
    <thead>
    <tr>
        <th scope="col">Nº Facture</th>
        <th scope="col">Date-Commande</th>
        <th scope="col">Facture Pro-format</th>
        <th scope="col">Fichier PDF</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($annonces as $a): ?>
        <tr>
            <th scope="row"><?php echo "fac/".$a['numComm']?></th>
            <td><?php echo $a['dateComm']?></td>
            <?php $str='Annonce/getProFormat/'.$a['idDepartement'].'/'.$a['idFournisseur'].'/'.$a['numComm'];?>
            <td><a class="btn btn-primary" href="<?php echo base_url($str)?>">PRO FORMAT</a></td>
            <td><a class="btn btn-primary" href="<?php echo base_url('Annonce/getpdf')?>">PDF</a></td>
            <td><a href="#">Validez</a></td>
            <td><a href="#">Refuser</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>



</div>
</div>
</div>
</body>
</html>

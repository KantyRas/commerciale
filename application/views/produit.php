<center><h1>Nos fournisseurs</h1></center>
<a class="btn btn-primary" href="<?php echo base_url('Produit/ajout')?>">Nouveau produit</a>
<br>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Désignation</th>
        <th scope="col">Quantité</th>
        <th scope="col">Prix unitaire</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $art):?>
    <tr>
        <th scope="row"><?php echo $art['idArticle']?></th>
        <td><?php echo $art['designation']?></td>
        <td><?php echo $art['quantite']?></td>
        <td><?php echo $art['prixUnitaire']?></td>
        <td><a href="#">delete</a></td>
        <td><a href="#">update</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

</div>
</div>
</div>
</body>
</html>


<center><h1>Nos fournisseurs</h1></center>
<a class="btn btn-primary" href="<?php echo base_url('Fournisseur/ajout')?>">Nouveau founisseur</a>
<br>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Téléphone</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($fournisseurs as $f):?>
    <tr>
        <th scope="row"><?php echo $f['idFournisseur']?></th>
        <td><?php echo $f['nomFournisseur']?></td>
        <td><?php echo $f['email']?></td>
        <td><?php echo $f['tel']?></td>
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

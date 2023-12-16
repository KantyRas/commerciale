
<section >
    <div id="logo">
        <p><img src="#"> </p>
    </div>
    <hr>
    <div id="detailsociete">
        <p>SEDERA</p>
        <p>Antananarivo,Ambohimanarina lot IVJ 30 A </p>
        <p>Antananarivo 101</p>
        <p>0343914184</p>
        <p>Madagascar</p>
        <p>rabearisoasedera32@gmail.com</p>
    </div>
    <div id="detailfacture">
        <?php foreach ($facturess as $f1):?>
            <p>Facture N°: <b><?php echo "fac/".$f1['numComm']?></b></p>
            <p><b>Antananarivo, le <?php echo $f1['dateComm']?></b></p>
        <?php endforeach;?>
    </div>
    <div id="objet">
        <h4>Objet: Pro-format</h4>
    </div>
    <br>
    <table>
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantite</th>
            <th>Prix Unitaire</th>
            <th>Montant</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($factures as $f2): ?>
            <tr>
                <td><?php echo $f2['designation'];?></td>
                <td><?php echo $f2['quantiteComm'];?></td>
                <td><?php echo $f2['prixUnitaire'];?> Ar</td>
                <td><?php echo $f2['montantTotal']?> Ar</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" class="total">Total HT:</td>
            <?php foreach ($facturess as $f3): ?>
            <td class="total"><?php echo $f3['prixht'];?> Ar</td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan="3" class="total">TVA (20%):</td>
            <?php foreach ($facturess as $f4): ?>
            <td class="total"><?php echo $f4['prixtva'];?> Ar</td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan="3" class="total">Total TTC:</td>
            <?php foreach ($facturess as $f5): ?>
                <td class="total"><?php echo $f5['prixttc'];?> Ar</td>
            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
    <div>
        <p>arrete a la somme de: </p>
    </div>
    <hr>
    <div id="sonia1">
        <p>Le client</p>
        <p>TEST</p>
    </div>
    <div id="sonia2">
        <p>Le Societe</p>
        <p>BALLOU</p>
    </div>
</section>


<style>
    /* */

    h1 {
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .total {
        font-weight: bold;
    }

    #logo{
        width: max-content;
        height: max-content;
        /* border: solid; */
    }
    #detailsociete{
        width: max-content;
        height: max-content;
        /* border: solid; */
        float: left;
    }
    #detailfacture{
        position:absolute;
        width: max-content;
        height: max-content;
        /* border: solid; */
        float: left;
        margin-left: 80%;
        margin-top: -7%;
    }
    #detailclient{
        float: left;
        margin-top: 0%;
        margin-left: 75%;
        width: max-content;
        height: max-content;
        /* border: solid; */
    }
    #objet{
        margin-bottom: -1%;
        color: blue;
        width: max-content;
        height: max-content;
        /* border: solid; */
    }
    #sonia1{
        /* border: solid; */
        float: left;
        margin-left: 5%;
    }
    #sonia2{
        /* border: solid; */
        float: right;
        margin-right: 5%;
        margin-bottom: 10%;

    }
    #logo img{
        width: 100px;
        height: 100px;
    }

</style>
</div>
</div>
</div>
</body>
</html>

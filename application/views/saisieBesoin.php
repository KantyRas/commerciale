<form id="formulaire" class="row g-3" action="<?php echo base_url('Achat/ajoutValeurFacture')?>" method="POST">
    <input type="hidden" name="idFournisseur" value="<?php echo $idf;?>">
    <input type="hidden" name="idDept" value="<?php echo $iddept;?>">
    <input type="hidden" name="num" value="<?php echo $num;?>">
    <input type="hidden" name="datef" value="<?php echo $datef;?>">
    <input type="hidden" name="iddept" value="">
    <div class="article-entry col-md-3 mt-3">
        <label for="produit" class="form-label">Produits</label>
        <select id="ref_produit" class="form-control" name="produit">
            <?php foreach ($produits as $produit):?>
            <option value="<?php echo $produit['idArticle']?>"
                    data-qte="<?php echo $produit['quantite']; ?>"
                    data-designation="<?php echo $produit['designation']; ?>"
                    data-puht="<?php echo $produit['prixUnitaire']; ?>">

            <?php echo "ART:" . $produit['designation']; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="qte" class="form-label">Quantité en stock</label>
        <input type="number" class="form-control" id="qte" name="qte">
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="designation" class="form-label">Désignation</label>
        <input type="text" class="form-control" id="designation" name="designation">
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="puht" class="form-label">Prix Unitaire HT</label>
        <input type="text" class="form-control" id="puht" name="puht">
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="qte_commande" class="form-label">Quantité demandé</label>
        <input type="number" class="form-control" id="qte_commande" name="qte_commande">
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="qte" class="form-label">Total</label>
        <input type="text" class="form-control" id="total_commande" name="total_commande">
    </div>

    <div class="col-12 mt-3">
        <input type="button" id="ajouter" name="ajouter" value="Ajouter Produit" class="btn btn-primary" onclick="plus_com();">
        <br>
        <br>
        <input type="submit" id="valider" name="valider" value="Facturer" class="btn btn-primary">
        <input type="text" id="param" name="param" style="visibility:hidden;">
        <input type="text" id="chaine_com" name="chaine_com" style="visibility:hidden;">
        <input type="text" id="total_com" name="total_com" style="visibility:hidden;">
    </div>
</form>

<br>
<br>
<hr>

<div style="float:left;width:10%;height:25px;"></div>
<div style="float:left;width:80%;height:auto;text-align:center;">
    <div class="titre_h1" style="float:left;height:auto;width:100%;">
        <div style="float:left;width:5%;height:25px;"></div>
        <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;">
            Ref.
        </div>
        <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;">
            Quantite
        </div>
        <div style="width:30%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:left;overflow:hidden;">
            Designation produit
        </div>
        <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:right;">
            PHT
        </div>
        <div style="width:15%;height:25px;float:left;font-size:16px;font-weight:bold;text-align:right;">
            Total
        </div>
        <div style="float:left;width:5%;height:25px;"></div>

        <div style="float:left;width:100%;height:auto;" id="det_com">
            <div class="bord"></div>
            <div class="suite">
            </div>
            <div class="suite">
            </div>
            <div class="des">
            </div>
            <div class="prix">
            </div>
            <div class="prix" style="font-weight:bold;">
            </div>
            <div class="bord"></div>
        </div>
    </div>
</div>
<script language='javascript' type="text/javascript">

    document.getElementById('ref_produit').addEventListener('change', function() {
        var selectedValue = this.value;
        var selectedOption = Array.from(this.options).find(function(option) {
            return option.value === selectedValue;
        });
        if (selectedOption) {
            document.getElementById('qte').value = selectedOption.getAttribute('data-qte');
            document.getElementById('designation').value = selectedOption.getAttribute('data-designation');
            document.getElementById('puht').value = selectedOption.getAttribute('data-puht');
        }
    });

    document.getElementById('qte_commande').addEventListener('input', function() {
        var qteCommande = parseInt(this.value);
        var puht = parseFloat(document.getElementById('puht').value);
        var totalCommande = qteCommande * puht;
        document.getElementById('total_commande').value = totalCommande;
    });
</script>

<script language='javascript' type="text/javascript">

    var tot_com = 0;

    function plus_com()
    {
        if(ref_produit.value != 0 && qte_commande.value != "0" && qte_commande.value != "")
        {
            if(parseInt(qte_commande.value) > parseInt(qte.value))
                alert("La quantité en stock n'est pas suffisante pour honorer la commande");
            else
            {
                var ref_p = ref_produit.value;
                var qte_p = qte_commande.value;
                var des_p = designation.value;
                var pht_p = puht.value;

                tot_com = tot_com + (qte_p*pht_p)*1.2;
                total_commande.value = tot_com.toFixed(2);
                total_com.value = total_commande.value;
                chaine_com.value += "|" + ref_p + ";" + qte_p + ";" + des_p + ";" + pht_p;
                facture();
            }
        }
    }


    function facture()
    {
        var tab_com = chaine_com.value.split('|');
        var nb_lignes = tab_com.length;
        document.getElementById("det_com").innerHTML = "";
        for (ligne=0; ligne<nb_lignes; ligne++)
        {
            if(tab_com[ligne]!="")
            {
                var ligne_com = tab_com[ligne].split(';');
                document.getElementById("det_com").innerHTML += "<div class='bord'></div>";
                document.getElementById("det_com").innerHTML += "<div class='suite'>" + ligne_com[0] + "</div>";
                document.getElementById("det_com").innerHTML += "<div class='suite'>" + ligne_com[1] + "</div>";
                document.getElementById("det_com").innerHTML += "<div class='des'>" + ligne_com[2] + "</div>";
                document.getElementById("det_com").innerHTML += "<div class='prix'>" + (ligne_com[3]*ligne_com[1]).toFixed(2) + "</div>";
                document.getElementById("det_com").innerHTML += "<div class='prix'>" + (1.2*(ligne_com[3]*ligne_com[1])).toFixed(2) + "</div>";
                document.getElementById("det_com").innerHTML += "<div class='bord'><input type='button' value='X' title='Supprimer le produit' style='height:20px; font-size:20x;' onclick='suppr(\"" + tab_com[ligne] + "\");' /></div>";
            }
        }
    }

    function suppr( ligne_s)
    {
        chaine_com.value = chaine_com.value.replace('|' + ligne_s, '');
        var tab_detail = ligne_s.split(";");

        total_commande.value = (total_commande.value - (tab_detail[1]*tab_detail[3])*1.2).toFixed(2);
        total_com.value = total_commande.value;
        tot_com = total_com.value*1;

        facture();
    }
</script>
<style>
    .bord
    {
        float:left;
        width:5%;
        height:25px;
    }

    .suite
    {
        width:15%;
        height:25px;
        float:left;
        font-size:16px;
        font-weight:normal;
        text-align:left;
    }

    .des
    {
        width:30%;
        height:25px;
        float:left;
        font-size:16px;
        font-weight:normal;
        text-align:left;
        overflow:hidden;
    }

    .prix
    {
        width:15%;
        height:25px;
        float:left;
        font-size:16px;
        font-weight:normal;
        text-align:right;
    }
</style>
</div>
</div>
</div>
</body>
</html>

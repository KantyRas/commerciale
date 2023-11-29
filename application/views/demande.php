<form class="row g-3" id="articleForm" action="" method="POST">
    <div class="col-12 mt-3">
        <button type="button" class="btn btn-success" onclick="addArticle()">Ajouter un article</button>
    </div>

    <div id="eto">

    </div>

    <div class="col-12 mt-3">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>

<div id="articleModel" style="display: none;">
    <div class="article-entry col-md-3 mt-3">
        <label for="article" class="form-label">Article</label>
        <input type="text" class="form-control" name="designation">
    </div>
    <div class="article-entry col-md-3 mt-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="text" class="form-control" name="quantite">
    </div>
</div>

<script>
    function addArticle() {
        var clone = document.getElementById('articleModel').cloneNode(true);
        clone.style.display = 'block';
        document.getElementById('eto').appendChild(clone);
    }
</script>



</div>
</div>
</div>
</body>
</html>

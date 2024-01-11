
<style>
    .addwiki {
  margin-top: 5rem;
  margin-left : 15rem;
 
}


</style>
<div class="addwiki">
    <h2>Ajouter un WIKI</h2>
<form method="post" style="width: 60rem;">
  <!-- Name input -->
  <div data-mdb-input-init class="form-outline  mb-4">
    <input type="text" id="form4Example1" name="title" class="form-control" />
    <label class="form-label" for="form4Example1">Titre</label>
  </div>

  <!-- Message input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <textarea name="content" class="form-control" id="form4Example3" rows="4"></textarea>
    <label class="form-label" for="form4Example3">Contenu</label>
  </div>



        <div class="border mb-4">
        <label class="form-label" for="form4Example3">#Tags :</label>
            <?php foreach ($tags as $tag) {?>
          <div class="form-check ">

                <input class="form-check-input" type="checkbox" value="<?=  $tag->id_tag; ?>" name="tag[]" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    <?=  $tag->tagName; ?>
                </label>
            </div>
            <?php  }  ?>
        </div>

        <div class="border mb-4">
        <label class="form-label" for="form4Example3">Categorie :</label>
        <?php foreach ($categories as $categorie) {?>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="<?= $categorie->id_category;?>"  name="categotie" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                <?=  $categorie->categoryName; ?>
                </label>
            </div>
            <?php  }  ?>
        </div>


  <!-- Submit button -->
  <button data-mdb-ripple-init name="submit" type="submit" class="btn btn-primary btn-block mb-4">Ajouter</button>
</form>
</div>

<style>
.carousel {
  margin-top: 5rem;
}
</style>
<div class="container carousel marketing">

       <h2>Mes Wikis</h2>
    <div class="row hidden-md-up">
        <!-- START THE FEATURETTES -->
      <?php
      if (!empty($wikis)) {
       foreach ($wikis as $wiki) {?>
        

           

        <div class="col-md-4 mb-2">
          <div class="card" style="width: 18rem;">
              <img src="image/image4.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $wiki->title;?></h5>
                <a href="delete?id=<?=$wiki->id;?>" class="btn btn-denger"><i class="fa-solid fa-trash" style="color: #d04351;"></i></a>
                <a href="wiki?id=<?=$wiki->id;?>" class="btn btn-denger"><i class="fa-solid fa-pen" style="color: #4c83e1;"></i></a>

              </div>
          </div>
          </div>


          
        <?php }}?>
        </div>
        <hr class="featurette-divider">

        </div>
</div>
<div class="container marketing">

       <h2>Mes Wikis</h2>
    <div class="row hidden-md-up">
        <!-- START THE FEATURETTES -->
      <?php foreach ($allwikis as $wiki) {?>
        

           

        <div class="col-md-4 mb-2">
          <div class="card" style="width: 18rem;">
              <img src="image/image4.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $wiki->title;?></h5>
                <a href="wiki?id=<?=$wiki->id;?>" class="btn btn-primary">voir details</a>
              </div>
          </div>
          </div>
        <?php }?>
        </div>
        <hr class="featurette-divider">

        </div>
</div>
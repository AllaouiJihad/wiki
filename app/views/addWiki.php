
<style>
    .addwiki {
  margin-top: 5rem;
  margin-left : 15rem;
 
}
.form-check-outline {

}

</style>
<div class="addwiki">
    <h2>Ajouter un WIKI</h2>
<form  style="width: 60rem;">
  <!-- Name input -->
  <div data-mdb-input-init class="form-outline  mb-4">
    <input type="text" id="form4Example1" name="title" class="form-control" />
    <label class="form-label" for="form4Example1">Titre</label>
  </div>

  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <input type="email" id="form4Example2" class="form-control" />
    <label class="form-label" for="form4Example2">Email address</label>
  </div>

  <!-- Message input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <textarea name="content" class="form-control" id="form4Example3" rows="4"></textarea>
    <label class="form-label" for="form4Example3">Contenu</label>
  </div>



        <div class="border mb-4">
        <label class="form-label" for="form4Example3">#Tags :</label>

            <div class="form-check  ">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Default checkbox
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Checked checkbox
                </label>
            </div>
        </div>

        <div class="border mb-4">
        <label class="form-label" for="form4Example3">Categorie :</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Default radio
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Default checked radio
                </label>
            </div>
        </div>


  <!-- Submit button -->
  <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4">Send</button>
</form>
</div>
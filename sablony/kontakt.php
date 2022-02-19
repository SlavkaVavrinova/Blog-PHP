<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="page-heading">
          <h1>Kontakt</h1>
          <span class="subheading">Máte pro nás nějaký vzkaz?</span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content-->
<main class="mb-4">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="my-5">

          <form method="POST">
            <div class="form-floating">
              <input name="jmeno" class="form-control" id="jmeno" type="text" placeholder="Jméno" />
              <label for="jmeno">Jméno</label>
            </div>
            <div class="form-floating">
              <input name="email" class="form-control" id="email" type="email" placeholder="Email" />
              <label for="email">Email</label>
            </div>
            <div class="form-floating mb-4">
              <textarea name="zprava" class="form-control" id="zprava" placeholder="Zpráva"
                style="height: 12rem"></textarea>
              <label for="zprava">Zpráva</label>
            </div>
            <!-- Submit Button-->
            <button class="btn btn-primary text-uppercase" type="submit">
              Odeslat
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
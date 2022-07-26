<template>

  <!-- header -->
  <div class="">
    <header id="site_header">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container flex-nowrap">
          <router-link class="navbar-brand" :to="{ name: 'home' }">
            <img
              class="brand_logo"
              src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f7/Deliveroo_logo.svg/1920px-Deliveroo_logo.svg.png"
              alt="brand_logo"
            />
          </router-link>
          <nav>
            <!-- Right Side Of Navbar -->
            <button class="login_btn d-flex" role="button">
              <a href="/login"> 
              <span class="px-2 d-none d-md-inline">Login</span>
              <i class="fa-solid fa-user"> </i>
              </a>
            </button>
          </nav>
        </div>
      </nav>

      <!-- Jumbotron carousel -->
      <div class="jumbotron fluid-container my_carousel">
        <div
          id="carouselExampleCaptions"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="https://images.pexels.com/photos/2983101/pexels-photo-2983101.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                class="d-block w-100"
                alt="#"
              />
              <div class="my_carousel_caption container">
                <h1>Il cibo che vuoi...</h1>
                <p class="d-none d-md-block">
                  I migliori ristoranti della città...
                </p>
              </div>
            </div>
            <div class="carousel-item">
              <img
                src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                class="d-block w-100"
                alt="#"
              />
              <div class="my_carousel_caption ">
                <h1>dove vuoi...</h1>
                <p class="d-none d-md-block">
                    a pochi passi da te...
                </p>
              </div>
            </div>
        </header>
        <!-- /#site_header -->

        <main id="site_main">
            <router-view></router-view>
        </main>
        <!-- /#site_main -->
        <footer id="site_footer">
            <div class="container">
                <nav class="row footer_row">
                    <div class="col">
                        <h3 class="">Scopri Deliveboo</h3>
                        <div class="list">
                            <li>
                                <p>
                                    <a href="/it/about-us" class=""
                                        >Chi siamo</a
                                    >
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="/it/takeaway/" class=""
                                        >Ristoranti</a
                                    >
                                </p>
                            </li>
                            <li>
                                <p class="">
                                    <a href="/it/more/" class="">Altro</a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a
                                        href="https://foodscene.deliveroo.it"
                                        class=""
                                        >Il nostro blog</a
                                    >
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a
                                        href="https://careers.deliveroo.it"
                                        class=""
                                        >Lavora con noi</a
                                    >
                                </p>
                            </li>
                            <li>
                                <p class="">
                                    <a
                                        href="https://restaurants.deliveroo.com/it-it/"
                                        class=""
                                        >Diventa nostro partner</a
                                    >
                                </p>
                            </li>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="">Note legali</h3>
                        <div class="list">
                            <li>
                                <p class="">
                                    <a href="/it/legal" class=""
                                        >Termini &amp; Condizioni</a
                                    >
                                </p>
                            </li>
                            <li>
                                <p class="">
                                    <a href="/it/privacy" class=""
                                        >Informativa sulla privacy</a
                                    >
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="/it/cookies" class="">Cookies</a>
                                </p>
                            </li>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="">Aiuto</h3>
                        <div class="list">
                            <li>
                                <p>
                                    <a href="/it/contact" class="">Contatti</a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="/it/faq" class="">FAQ</a>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <a href="/it/cuisines" class=""
                                        >Tipi di cucina</a
                                    >
                                </p>
                            </li>
                        </div>
                    </div>
                </nav>

                <nav class="container d-flex justify-content-between">
                    <div class="row">
                        <div class="media d-flex">
                            <li>
                                <a
                                    href="https://www.facebook.com/DeliverooIT"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Facebook"
                                    aria-label="Facebook"
                                    class="media"
                                    ><span class="media"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-facebook"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                            /></svg></span
                                ></a>
                            </li>
                            <li class="">
                                <a
                                    href="https://twitter.com/deliveroo_italy"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Twitter"
                                    aria-label="Twitter"
                                    class="media"
                                    ><span class="media"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-twitter"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
                                            /></svg></span
                                ></a>
                            </li>
                            <li class="">
                                <a
                                    href="https://instagram.com/deliveroo_italy"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    title="Instagram"
                                    aria-label="Instagram"
                                    class="media"
                                    ><span class="media"
                                        ><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-instagram"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                            /></svg></span
                                ></a>
                            </li>
                        </div>
                    </div>
                    <div class="copyright text-white">
                        <p>© 2022 DeliveBoo</p>
                    </div>
                </nav>
            </div>
        </footer>
        <!-- /#site_footer -->
    </div>
</template>

<script>
export default {
    name: "App",
};
</script>

<style lang="scss" scoped>



.brand_logo {
    height: 50px;
    width: auto;
}

.login_btn {

  align-items: center;
  background-color: white;
  border: 0 solid #e2e8f0;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1),
    0 2px 4px -1px rgba(0, 0, 0, 0.06);
  box-sizing: border-box;
  color: #1a202c;
  display: flex;
  font-family: 'Roboto', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  height: 50px;
  justify-content: center;
  line-height: 24px;
  overflow-wrap: break-word;
  padding: 16px 40px;
  text-decoration: none;
  width: auto;
  border-radius: 8px;
  cursor: pointer;



  a {
    color: #00c1b2;

    text-decoration: none;
    width: auto;
    border-radius: 8px;
    cursor: pointer;

    a {
        color: white;
        text-decoration: none;
    }
}

/* Jumbotron section */



.jumbotron {
  min-width: 320px;

  .carousel-inner {
  font-family: 'Roboto', sans-serif !important;

  img {
    width: 100%;
    min-width: 100px;
    max-height: 400px;
    object-fit: cover;
    filter: contrast(0.7);
  }
  h1 {
    font-size: calc(0.75em + 3vmin)!important;
    font-weight: 800;
    text-transform: uppercase;
  }

  .my_carousel_caption {
    position: absolute;
    bottom: 1.25em;
    left: 2.5em;
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
    color: #fff;
    text-align: left;
    font-size: calc(0.75em + 2vmin)!important;
  }


#site_footer {
    background-color: #2e3333;

    .col {
        background-color: #424646;
        margin: 35px 20px;
        border-radius: 6px;
        padding: 32px;
    }

    li {
        list-style: none;
    }
    a {
        text-decoration: none;
        color: white;
        &:hover {
            color: #00c1b2;
        }
    }

    h3 {
        font-family: plex-sans, sans-serif;
        font-size: 18px;
        line-height: 24px;
        font-weight: 700;
        color: white;
        text-align: left;
        margin-bottom: 20px;
    }

    .list {
        line-height: 15px;
    }

    .media svg {
        color: white !important;
        margin-right: 10px;
    }
}
@media only screen and (min-width: 768px) {
    .footer_row {
        min-width: auto;
    }

}
}
</style>

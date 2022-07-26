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
            <div class="carousel-item">
              <img
                src="https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                class="d-block w-100"
                alt="#"
              />
              <div class="my_carousel_caption">
                <h1>...e quando vuoi!</h1>
                <p class="d-none d-md-block">
                  ...pronti in un battito d'occhio!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- /#site_header -->

    <main id="site_main">
      <router-view></router-view>
    </main>
     <!-- /#site_main -->
    <footer id="site_footer">
      <p class="text-center">Made with &hearts; by <em>Team 2</em></p>
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
}
}
</style>
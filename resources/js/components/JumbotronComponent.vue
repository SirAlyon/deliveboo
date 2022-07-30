<template>
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
            src="https://images.pexels.com/photos/1639562/pexels-photo-1639562.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
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
            src="https://images.pexels.com/photos/1907228/pexels-photo-1907228.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
            class="d-block w-100"
            alt="#"
          />
          <div class="my_carousel_caption">
            <h1>dove vuoi...</h1>
            <p class="d-none d-md-block">a pochi passi da te...</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="https://images.pexels.com/photos/1633525/pexels-photo-1633525.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
            class="d-block w-100"
            alt="#"
          />
          <div class="my_carousel_caption">
            <h1>...e quando vuoi!</h1>
            <p class="d-none d-md-block">...pronti in un battito d'occhio!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "JumbotronComponent",
};
</script>

<style lang="scss" scoped>
// jumbo

.jumbotron {
  min-width: 320px;

  .carousel-inner {
    font-family: "Roboto", sans-serif !important;

    img {
      width: 100%;
      min-width: 100px;
      max-height: 400px;
      object-fit: cover;
      filter: contrast(0.7);
    }
    h1 {
      font-size: calc(0.75em + 3vmin) !important;
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
      font-size: calc(0.75em + 2vmin) !important;
    }
  }
}
</style>

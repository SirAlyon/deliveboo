<template>
  <div class="notfound_page">
    <div class="container section_wrapper">
      <h1 class="display-3">Page not found</h1>

      <div class="container px-4">
        <span>
            This page doesn't exist.
        </span>
        <br>
        <div class="btn btn-primary text-decoration-none mt-4">
            <router-link :to="{ name: 'home' }">Go back to Homepage</router-link>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  neme: "NotFound",
};
</script>


<style lang="scss" scoped>
.notfound_page {
  min-height: 100vh;
  background-image: url(https://deliveroo.it/assets/images/error-pages/background-7edaa013aceff22965bdb7fbf274b4a2.svg);
  background-repeat: no-repeat;
  text-align: center;
  padding: 137px 16px 32px;
}

.section_wrapper {
  background: transparent
    url(https://deliveroo.it/assets/images/error-pages/roo-5c784b3ea96399e6269af8a11ec6349c.svg) no-repeat 50% 0;
    padding-top: 200px;

    span{
        color:rgb(27, 27, 27)
    }

    .btn.btn-primary {
    background-repeat: no-repeat;
    background-color: #00ccbc;
    border: none;
    box-shadow: none;
    outline: none;
    color: #FFF;
    font-weight: 600;
    }

    a {
    color: white;
    text-decoration: none;
    }
}
</style>
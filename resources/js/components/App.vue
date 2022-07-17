<template>

    <!-- header -->
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <router-link class="navbar-brand" :to="{name: 'home'}">
                <img class="brand_logo" src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f7/Deliveroo_logo.svg/1920px-Deliveroo_logo.svg.png" alt="brand_logo">
            </router-link>
            <nav>
                <!-- Right Side Of Navbar -->
                <button class="login_btn" role="button"><a href="/login"> Login </a></button>
            </nav>
        </div>
    </nav>

        <router-view></router-view>
    </div>
</template>


<script>
    export default {
        name: 'App',
    }
</script>

<style lang="scss" scoped>

.brand_logo{
    height: 50px;
    width: auto;
}


.login_btn {

  align-items: center;
  background-color: #00c1b2; //brand-color
  border: 0 solid #E2E8F0;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  box-sizing: border-box;
  color: #1A202C;
  display: inline-flex;
  font-family: Inter, sans-serif;
  font-size: 1rem;
  font-weight: 700;
  height: 50px;
  justify-content: center;
  line-height: 24px;
  overflow-wrap: break-word;
  padding: 18px 60px;
  text-decoration: none;
  width: auto;
  border-radius: 8px;
  cursor: pointer;

  a{
      color:white;
      text-decoration: none;
  }
}
</style>

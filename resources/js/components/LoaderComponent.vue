<template>
    
</template>

<script>
export default {
    name: 'LoaderComponent'
}
</script>

<style lang="scss" scoped>
/* Loader */
.loader_wrapper {
  background-color: white;
  height: 100vh;
}
.loader {
  padding: 30px;
  border: 10px solid #00ccbc;
  box-shadow: 0 0 5px 1px #00ccbc;
  border-right-color: transparent;
  border-radius: 50%;
  animation: rotate 1s infinite linear;
  position: absolute;
  top: 70%;
  left: 50%;
}

@keyframes rotate {
  100% {
    transform: rotate(360deg);
  }
}

</style>
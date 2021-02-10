<template>
  <div class="fullscreen text-white text-center q-pa-md flex flex-center">
    <div>
      <div style="font-size: 30vh">
        <img src="../statics/undraw/undraw_page_not_found_su7k.svg" style="max-width: 80%;" >
      </div>

      <div class="text-h2" style="opacity:.4">
        Oops. Nothing here...
      </div>

      <q-btn
        class="q-mt-xl"
        color="white"
        text-color="primary"
        unelevated
        to="/"
        label="Go Home"
        no-caps
      />
    </div>
  </div>
</template>

<script>
export default {
  name: 'Error404'
}
</script>

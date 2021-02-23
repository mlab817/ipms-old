<template>
  <q-layout view="lHh Lpr lFf">
    <q-page-container>
      <q-page class="flex bg-image flex-center">
        <q-card class="bg-primary" dark bordered square flat style="width: 90vw; min-width: 360px; max-width: 480px;">
          <q-card-section>
            <div class="row justify-center">
               <img src="../statics/logo/cover.png" width="50%" />
            </div>
            <div class="row items-center q-gutter-md">
              <div class="col">
                <div class="row  justify-center">
                  <img src="../statics/undraw/undraw_Login_re_4vu2.svg" width="100%" >
                </div>
              </div>
              <div class="col q-gutter-y-md">
                <q-input dark v-model="username" label="Username" stack-label />
                <q-input dark v-model="password" label="Password" type="password" stack-label />
                <div class="row justify-end q-gutter-md">
                  <q-btn label="Register" flat />
                  <q-btn label="Login" outline />
                </div>
              </div>
            </div>
          </q-card-section>
        </q-card>
      </q-page>
    </q-page-container>

  </q-layout>
</template>

<script>
export default {
  name: 'PageLogin',
  data() {
    return {
      username: '',
      password: ''
    }
  }
}
</script>

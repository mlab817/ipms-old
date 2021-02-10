<template>
  <q-layout view="lHh Lpr lFf">
    <q-header class="bg-white text-black">
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="leftDrawerOpen = !leftDrawerOpen"
        />

        <q-avatar>
          <img src="../statics/logo/default.png"  alt="IPMS Logo">
        </q-avatar>

        <q-toolbar-title>
          IPMS v2
        </q-toolbar-title>
      </q-toolbar>
      <q-separator />
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      :width="250"
      :breakpoint="360"
      bordered
      content-class="bg-primary text-white"
    >
      <q-list>
        <q-item-label
          header
          class="text-grey-8"
        >
          Essential Links
        </q-item-label>
        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import EssentialLink from 'components/EssentialLink.vue'

const linksData = [
  {
    title: 'Dashboard',
    caption: 'quasar.dev',
    icon: 'dashboard',
    link: '/'
  },
  {
    title: 'Add Project',
    caption: 'Add a new project',
    icon: 'fiber_new',
    link: '/projects/create'
  },
  {
    title: 'Projects',
    caption: 'List of Projects',
    icon: 'code',
    link: '/projects'
  },
  {
    title: 'Profile',
    caption: 'Update personal information',
    icon: 'person',
    link: '/profile'
  }
]

export default {
  name: 'MainLayout',
  components: { EssentialLink },
  data () {
    return {
      leftDrawerOpen: false,
      essentialLinks: linksData
    }
  }
}
</script>

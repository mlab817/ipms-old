<template>
  <q-page>
    <q-list>
      <div class="row q-pa-md items-center">
        <div class="text-h5 text-weight-bolder text-primary">
          Projects
        </div>
        <q-space />
        <!-- TODO: Hide this button if user has no permission to create project -->
        <q-btn color="secondary" label="New Project" no-caps unelevated to="/projects/create" />
      </div>
      <div class="row q-pa-md">
        <search-projects v-model="q" @input="searchProjects" />
      </div>
      <template v-if="loading">
        <div class="row items-center justify-center q-pa-md">
          <q-spinner color="primary"></q-spinner> Loading...
        </div>
      </template>
      <template v-else>
        <template v-if="projects.length > 0">
          <q-item v-for="project in projects" :key="project.id" :clickable="project.permissions.view" @click.stop="viewProject(project.slug)">
            <q-item-section avatar>
              <q-avatar class="bg-primary text-white">
                {{ project.office && project.office.acronym && project.office.acronym.charAt(0) }}
              </q-avatar>
            </q-item-section>
            <q-item-section>
              <q-item-label class="text-uppercase" v-html="$options.filters.searchHighlight(project.title, q)" />
              <q-item-label caption :lines="2" v-html="$options.filters.searchHighlight(project.description, q)" />
              <q-item-label>
                <q-badge :label="project.pap_type && project.pap_type.name" color="amber-14"></q-badge>
              </q-item-label>
            </q-item-section>
            <q-item-section side>
              <q-icon name="bookmark" color="grey-5" @click.stop="bookmarkThisProject(project.slug)">
                <q-tooltip>
                  Bookmark this project
                </q-tooltip>
              </q-icon>
            </q-item-section>
          </q-item>
          <div class="row justify-center q-my-md">
            <q-pagination
              v-model="currentPage"
              :max-pages="10"
              :max="lastPage"
              :direction-links="true"
              @input="navigatePage"
            >
            </q-pagination>
          </div>
        </template>
        <div class="row q-pa-md justify-center" v-else>
          <template v-if="q">
            No search results for "<span class="text-weight-bold">{{ q }}</span>".
          </template>
          <template v-else>
            No projects found.
          </template>
        </div>
      </template>
    </q-list>

  </q-page>
</template>

<script>
import SearchProjects from 'components/SearchProjects'
import { ProjectAPI } from '../api/projects'

export default {
  name: 'ProjectsIndex',
  components: { SearchProjects },
  data () {
    return {
      projects: [],
      q: null,
      currentPage: 1,
      lastPage: 1,
      loading: false,
      limit: 10
    }
  },
  watch: {
    $route: function (to) {
      const params = to.query

      this.getProjects(params)
    }
  },
  methods: {
    viewProject(slug) {
      this.$router.push(`/projects/${slug}`)
    },
    editProject(slug) {
      this.$router.push(`/projects/${slug}/edit`)
    },
    deleteProject(slug) {
      this.$q.dialog({
        title: 'Are you sure you want to delete this project?',
        cancel: true
      }).onOk(() => {
        // TODO: Implement deletion
      })
    },
    navigatePage(e) {
      const query = this.$route.query
      this.$router.push({
        name: 'index-projects',
        query: {
          ...query,
          page: e
        }
      })
    },
    searchProjects() {
      const page = 1 // reset page to 1
      this.$router.push({
        name: 'index-projects',
        query: {
          q: this.q,
          page: page
        }
      })
    },
    getProjects(params) {
      this.loading = true
      ProjectAPI
        .index({ params: params })
        .then(res => {
          console.log(res)
          const {
            data,
            meta
          } = res
          this.projects = data
          this.currentPage = meta.current_page
          this.lastPage = meta.last_page
        })
        .catch(err => console.log(err.message))
        .finally(() => (this.loading = false))
    },
    bookmarkThisProject(slug) {
      alert(slug)
    }
  },
  filters: {
    searchHighlight(value, search) {
      // if (search) {
      //   let regex = new RegExp(search, 'ig');
      //   return value && value.replace(regex, (match) => {
      //     return `<span class="bg-yellow-6">${match}</span>`;
      //   });
      // }
      const keywords = search && search.split(/[., -]/)
      if (keywords && keywords.length) {
        return keywords.reduce((value, word) => {
          console.log(word)
          const regex = new RegExp(word, 'ig')
          const valueToReturn = value && value.replace(regex, (match) => {
            return `<span class="bg-yellow-6">${match}</span>`
          })
          console.log(valueToReturn)
          return valueToReturn
        }, value)
      }
      return value
    }
  },
  mounted() {
    const params = this.$route.query
    this.getProjects(params)
    this.$axios.get('/pdp_indicators')
      .then(res => console.log(res.data.data))
  }
}
</script>

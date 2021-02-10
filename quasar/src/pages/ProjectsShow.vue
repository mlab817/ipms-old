<template>
  <q-page>
    <q-card square flat bordered class="bg-primary text-white" v-if="project">
      <q-card-section>
        <div class="text-caption">
          PIPOL Code: {{project.code}}
        </div>
        <div class="text-h5 text-weight-bolder">
          {{project.title}}
        </div>
        <div class="text-subtitle1 q-mt-sm">
          <q-item-label :lines="5">
            {{project.description}}
          </q-item-label>
        </div>
        <div class="row items-center">
          <q-icon name="person" /> &nbsp;Created by {{(project.creator && project.creator.name) || '-'}} on {{project.created_at}}
        </div>
        <div class="row items-center">
          <q-icon name="event" /> &nbsp;Last updated by {{ (project.updater && project.updater.name) || '-'}} on {{project.updated_at}}
        </div>
        <div class="row q-gutter-sm q-mt-md">
          <q-btn outline label="Edit" icon-right="edit" :disable="!project.permissions.update" />
          <q-btn outline label="Delete" icon-right="delete" :disable="!project.permissions.delete" />
          <q-btn outline label="Share" icon-right="share" />
        </div>
      </q-card-section>
    </q-card>

    <project-view :project="project"></project-view>
  </q-page>
</template>

<script>
import { ProjectAPI } from 'src/api/projects'
import ProjectView from 'components/ProjectView'

export default {
  name: 'ProjectsShow',
  components: { ProjectView },
  data() {
    return {
      project: {
        id: null,
        code: null,
        title: null,
        description: null,
        expected_outputs: null,
        pap_type: {},
        regular_program: false,
        spatial_coverage: {},
        iccable: false,
        pip: false,
        pip_typology: {},
        research: false,
        cip: false,
        cip_type_id: 6,
        cip_type: {},
        trip: false,
        rdip: false,
        rdc_endorsement_required: null,
        rdc_endorsed: false,
        rdc_endorsed_date: null,
        other_infrastructure: null,
        risk: null,
        pdp_chapter_id: null,
        pdp_chapter: {},
        no_pdp_indicator: false,
        gad_id: null,
        gad: {},
        target_start_year: null,
        target_end_year: null,
        preparation_document: {},
        has_fs: false,
        feasibility_study: {},
        has_row: false,
        right_of_way: {},
        has_rap: false,
        resettlement_action_plan: {},
        employment_generated: null,
        funding_source_id: null,
        funding_source: {},
        implementation_mode_id: null,
        implementation_mode: {},
        fs_investments: [
          {
            funding_source: {},
            y2016: 0,
            y2017: 0,
            y2018: 0,
            y2019: 0,
            y2020: 0,
            y2021: 0,
            y2022: 0,
            y2023: 0,
            y2024: 0,
            y2025: 0,
            total: 0
          }
        ],
        fs_infrastructures: [
          {
            funding_source: {},
            y2016: 0,
            y2017: 0,
            y2018: 0,
            y2019: 0,
            y2020: 0,
            y2021: 0,
            y2022: 0,
            y2023: 0,
            y2024: 0,
            y2025: 0,
            total: 0
          }
        ],
        region_investments: [
          {
            region: {},
            y2016: 0,
            y2017: 0,
            y2018: 0,
            y2019: 0,
            y2020: 0,
            y2021: 0,
            y2022: 0,
            y2023: 0,
            y2024: 0,
            y2025: 0,
            total: 0
          }
        ],
        other_fs: null,
        project_status_id: null,
        project_status: {},
        updates: null,
        updates_date: null,
        uacs_code: null,
        tier_id: null,
        tier: {},
        approval_level_id: null,
        approval_level: {},
        approval_date: null,
        nep: {},
        allocation: {},
        disbursement: {},
        regions: [],
        creator: {},
        updater: {},
        deleter: {},
        created_at: null,
        updated_at: null,
        permissions: {
          view: false,
          update: false,
          delete: false,
          restore: false,
          forceDelete: false
        }
      }
    }
  },
  methods: {
    getProject(slug) {
      ProjectAPI.show(slug)
        .then(res => (this.project = res.data))
        .catch(err => console.log(err.message))
    }
  },
  created() {
    const slug = this.$route.params.slug
    this.getProject(slug)
  }
}
</script>

<style scoped>
.q-item__label--header {
  color: #00242c !important;
  font-weight: bold;
}
</style>

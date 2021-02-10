
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { path: 'projects/create', component: () => import('pages/ProjectsCreate.vue') },
      { path: 'projects/:slug', component: () => import('pages/ProjectsShow.vue') },
      {
        path: 'projects',
        name: 'index-projects',
        component: () => import('pages/ProjectsIndex.vue')
      }
    ]
  },
  {
    path: '/login',
    component: () => import('pages/PageLogin.vue')
  },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes

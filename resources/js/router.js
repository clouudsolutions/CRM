import { createWebHistory, createRouter } from 'vue-router';

import CreateTemplate from './components/htmlEditor/CreateTemplate.vue';
import ViewTemplate from './components/htmlEditor/ViewTemplate.vue';
import PreviewTemplate from './components/htmlEditor/PreviewTemplate.vue';
import EditTemplate from './components/htmlEditor/EditTemplate.vue';

const routes = [
{ path: '/create_template', component: CreateTemplate , name: 'create_template'},
{ path: '/view_template', component: ViewTemplate , name: 'view_template'},
{ path: '/edit_template/:id/:file_name', component: EditTemplate , name: 'edit_template'},
{ path: '/preview_template/:id/:file_name', component: PreviewTemplate , name: 'preview_template' },
]
const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;

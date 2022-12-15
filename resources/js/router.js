import { createWebHistory, createRouter } from 'vue-router';

// Html Editor Components
import CreateTemplate from './components/htmlEditor/CreateTemplate.vue';
import ViewTemplate from './components/htmlEditor/ViewTemplate.vue';
import PreviewTemplate from './components/htmlEditor/PreviewTemplate.vue';
import EditTemplate from './components/htmlEditor/EditTemplate.vue';

// Team Managements Components
import CreateTeamMember from './components/team/CreateTeamMember.vue';
import ViewTeamMember from './components/team/ViewTeamMember.vue'

// Tasks Management Components
import CreateTask from './components/task/CreateTask.vue';
import ViewTask from './components/task/ViewTask.vue'

const routes = [
// Html Editor routes
{ path: '/create_template', component: CreateTemplate , name: 'create_template'},
{ path: '/view_template', component: ViewTemplate , name: 'view_template'},
{ path: '/edit_template/:id/:file_name', component: EditTemplate , name: 'edit_template'},
{ path: '/preview_template/:id/:file_name', component: PreviewTemplate , name: 'preview_template' },

// Team Management routes
{ path: '/create_team', component: CreateTeamMember , name: 'create_team'},
{ path: '/view_team', component: ViewTeamMember , name: 'view_team'},

// Task Management routes
{ path: '/create_task', component: CreateTask , name: 'create_task'},
{ path: '/view_task', component: ViewTask , name: 'view_task'},

]
const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;

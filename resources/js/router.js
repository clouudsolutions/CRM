import { createWebHistory, createRouter } from 'vue-router';

// Html Editor Components
import CreateTemplate from './components/htmlEditor/CreateTemplate.vue';
import ViewTemplate from './components/htmlEditor/ViewTemplate.vue';
import PreviewTemplate from './components/htmlEditor/PreviewTemplate.vue';
import EditTemplate from './components/htmlEditor/EditTemplate.vue';

// Team Managements Components
import UserList from './components/team/UserList.vue'
import ViewUser from './components/team/ViewUser.vue'

// Role Components
import RoleList from './components/role/RoleList.vue'


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
{ path: '/user_list', component: UserList , name: 'user_list'},
{ path: '/view_user/:id', component: ViewUser , name: 'view_user'},

// Role routes
{ path: '/role_list', component: RoleList , name: 'role_list'},

// Task Management routes
{ path: '/create_task', component: CreateTask , name: 'create_task'},
{ path: '/view_task', component: ViewTask , name: 'view_task'},

]
const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;

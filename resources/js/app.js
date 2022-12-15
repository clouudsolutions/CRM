import './bootstrap';
import { createApp } from 'vue';
import router from '@/router';
const app = createApp( {} );

import CreateTemplate from '@/components/htmlEditor/CreateTemplate.vue';
import ViewTemplate from '@/components/htmlEditor/ViewTemplate.vue';
import EditTemplate from '@/components/htmlEditor/EditTemplate.vue';
import PreviewTemplate from '@/components/htmlEditor/PreviewTemplate.vue';


app.component( 'create_template_component' , CreateTemplate );
app.component( 'view_template_component' , ViewTemplate );
app.component( 'preview_template_component' , PreviewTemplate );
app.component( 'edit_template_component' , EditTemplate );


app
.use(router)
.mount( '#app' );


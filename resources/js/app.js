import './bootstrap';
import { createApp } from 'vue';
const app = createApp( {} );

import HtmlEditor from '@/components/HtmlEditorComponent.vue';

app.component( 'html_editor_component' , HtmlEditor );

app.mount( '#app' );

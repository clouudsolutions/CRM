<template>
    <div class="col">
        <h2>Preview - {{ $route.params.file_name }}</h2>
        <div id="viewer" v-html="editor_data" style="width:720px;">
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return {
            'editor_data' : '',
            'id' : this.$route.params.id
        }
    },
    mounted(){
        this.getData()
    },
    methods: {
        getData(){
            axios.get(`/htmleditor/${this.id}`)
            .then(res=>{
                // console.log(res.data);
                this.editor_data = res.data;
            })
        }
    }
}
</script>

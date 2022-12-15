<template>
    <div>
        <!-- Edit Template -->
        <div class="m-5">
            <div class="row">
                <div class="col">
                    <h2>Edit Template - {{ $route.params.file_name }}</h2>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="float:right;" @click="updateData">
                        Update Template
                    </button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h2>Edit Here</h2>
                    <textarea id="editor" v-model="editor_data"
                    placeholder="Start Coding"></textarea>
                </div>
                <div class="col">
                    <h2>Output</h2>
                    <div id="viewer" v-html="editor_data">
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return {
            editor_data : '',
            id    : this.$route.params.id
        }
    },
    mounted(){
        this.getData();
    },
    methods:{
        getData(){
            axios.get(`/htmleditor/${this.id}`)
            .then(res=>{
                // console.log(res.data);
                this.editor_data = res.data;
            })
        },
        updateData(){
            axios.put(`/htmleditor/${this.id}`, { 'editor_data' : this.editor_data })
            .then(res=>{
                alert(res.data);
                this.router.replace('/view_template')
            })
        }
    }
}
</script>

<style>
h2{
    margin-left: 10px;
}
 #editor{
            width: 100%;
            height: 100vh;
            margin: 10px;
            padding: 10px;
            color: #fff;
            resize: none;
            border-radius: 5px;
            background-color: black;
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
            /* box-shadow: 0 4px 8px 0 #04c8c8; */

        }
        #viewer{
            width: 100%;
            height: 100vh;
            margin: 10px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)
        }
</style>

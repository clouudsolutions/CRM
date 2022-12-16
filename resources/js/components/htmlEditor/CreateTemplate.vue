<template>
    <div>
        <div class="row m-2">
            <!-- Header -->
                <div class="col">
                    <h1>Template Creater</h1>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="float:right;" @click="saveData">
                        Save File
                    </button>

                </div>
        </div>
        <!-- Finish Header -->
        <!-- Create Template -->
        <div class="row m-3">
            <div class="col">
                <h2>Create Template</h2>
                <textarea id="editor" v-model="editor_data"
                placeholder="Start Coding"></textarea>
            </div>
            <div class="col m-2">
                <h2>Output</h2>
                <div id="viewer" v-html="editor_data">
                </div>
            </div>
        </div>
        <!-- Finish Create Template -->

    </div>
</template>

<script>
export default {
    data(){
        return {
            editor_data : '',
        }
    },
    methods:{
        saveData(){
            try {
                axios.post('/htmleditor', {'editor_data' : this.editor_data})
                .then(res=>{
                        alert(res.data)
                        this.$router.push({ name : 'view_template'})
                        // alert("Data "+ this.editor_data + " sent successfully")
                })
            } catch (e) {
                console.log(e);
            }
        },
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

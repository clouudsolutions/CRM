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

        <!-- Show saved files  -->
        <div class="container m-3">
            <h1>My Files</h1>
            <table class="table table-striped table-hover">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Files
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        <tr v-for="(item , index) in files_data" :key="item.id">
                            <td>
                                {{ index + 1 }}
                            </td>
                            <td>
                                {{ item.user_id }}
                            </td>
                            <td>
                                {{ item.file_data }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning m-1" @click="editData(item.id)">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </td>
                        </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            editor_data : '',
            files_data: []
        }
    },
    mounted(){
        this.fetchall()
    },
    methods:{
        fetchall(){
            axios.get('/htmleditor')
            .then(res => {
                console.log(res.data)
                this.files_data = res.data
            })
        },
        saveData(){
            try {
                axios.post('/htmleditor', {'editor_data' : this.editor_data})
                .then(res=>{
                        alert(res.data)
                        console.log(res.data)
                        // alert("Data "+ this.editor_data + " sent successfully")
                })
            } catch (e) {
                console.log(e);
            }
        },
        editData(id){
            axios.get(`/htmleditor/${id}`)
            .then(res=>{
                console.log(typeof(res.data))
                console.log(res.data)
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

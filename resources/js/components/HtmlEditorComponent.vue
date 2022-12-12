<template>
    <div>
        <div class="container m-3">
                <h1>Html File Editor</h1>
                <button type="submit" class="btn btn-primary " @click="saveData">
                    Save File
                </button>
        </div>
        <div class="container row">
            <div class="col">
                <textarea id="editor" v-model="editor_data"
                placeholder="Start Coding"></textarea>
            </div>
            <div id="viewer" v-html="editor_data" class="col">
            </div>
        </div>
        <div class="container m-3">
            <h1>
                My files
            </h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Files</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            editor_data : ''
        }
    },
    methods:{
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
        }
    }
}
</script>

<style>
 #editor{
            width: 100%;
            height: 100vh;
            margin: 10px;
            padding: 10px;
            color: #fff;
            resize: none;
            border-radius: 5px;
            background-color: black;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)
        }
        #viewer{
            width: 100%;
            height: 100vh;
            margin: 10px;
            padding: 10px;
            background-color: rgb(244, 217, 217);
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2)
        }
</style>

<template>
    <div>
        <!-- Show saved files  -->
        <div class="container m-3">
            <h1>Templates</h1>
            <table class="table table-striped table-hover m-5">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                User_Id
                            </th>
                            <th>
                                Files
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        <tr v-for="(item , index) in all_files_data" :key="item.id">
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
                                <router-link :to="'/edit_template/' + item.id+ '/' + item.file_data" class="btn btn-sm btn-warning">
                                    Edit
                                </router-link>
                                <button class="btn btn-sm btn-danger m-1" @click="deleteData(item.id)">
                                    Delete
                                </button>
                                <button class="btn btn-sm btn-success m-1" @click="downloadData(item.id)">
                                    Download
                                </button>
                                <router-link :to="'/preview_template/' + item.id+ '/' + item.file_data" class="btn btn-sm btn-primary">
                                    Preview
                                </router-link>

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
            all_files_data : [],
            is_editing : false,
            temp_id    : '',
        }
    },
    mounted(){
        this.fetchall();
        this.is_editing = false;
    },
    methods:{
        fetchall(){
            axios.get('/htmleditor')
            .then(res => {
                console.log(res.data)
                this.all_files_data = res.data
            })
        },
        deleteData(id){
            axios.delete(`/htmleditor/${id}`)
            .then(res=>{
                console.log(res.data);
                this.fetchall();
                this.is_editing = false;
            })
        },
        downloadData(id){
            alert("download functionality");
        }
    }
}
</script>


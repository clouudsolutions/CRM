<template>
    <div>
        <!-- Show Team files  -->
        <div class="container m-3">
            <h1>View Team Members</h1>
            <table class="table table-striped table-hover m-5">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Member Name
                            </th>
                            <th>
                                Member Email
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        <tr v-for="(item , index) in all_member_data" :key="item.id">
                            <td>
                                {{ index + 1 }}
                            </td>
                            <td>
                                {{ item.name }}
                            </td>
                            <td>
                                {{ item.email }}
                            </td>
                            <td>
                                <!-- <router-link to="" class="btn btn-sm btn-warning">
                                    Edit
                                </router-link> -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    @click="getMemberData(item.id)">
                                    Edit
                                </button>

                                <button class="btn btn-sm btn-danger m-1" @click="deleteData(item.id)">
                                    Delete
                                </button>
                            </td>
                        </tr>
            </table>
        </div>

         <!-- Modal -->
         <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" v-model="name" class="form-control" id="name" required>

                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" v-model="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="updateData">
                        Update
                    </button>
                </div>
            </div>
            </div>
        </div>

    </div>
</template>
<script>
export default{
    data(){
        return {
            'name' : '',
            'email' : '',
            'temp_id' : '',
            all_member_data : [],
        }
    },
    mounted(){
        this.fetchAll();
    },
    methods: {
        fetchAll(){
            axios.get('/team_management')
            .then(res=>{
                // alert(res.data)
                this.all_member_data = res.data
            })
        },
        getMemberData(id){
            axios.get(`/team_management/${id}`)
            .then(res=>{
                this.name = res.data.name;
                this.email = res.data.email;
                this.temp_id = res.data.id;
            })
        },
        updateData(){
            axios.put(`/team_management/${this.temp_id}`,{ 'name' : this.name , 'email' : this.email})
            .then(res=>{
                this.fetchAll();
            })
        },
        deleteData(id){
            axios.delete(`/team_management/${id}`)
            .then(res=>{
                console.log(res.data);
                this.fetchAll();
            })
        }
    }
}
</script>

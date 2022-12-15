<template>
    <div>
        <!-- Show Team files  -->
        <div class="container m-3">
            <h1>View Tasks</h1>
            <table class="table table-striped table-hover m-5">
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Task Name
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Assignee
                            </th>
                            <th>
                                Sharing
                            </th>
                            <th>
                                Followers
                            </th>
                            <th>
                                Tags
                            </th>
                            <th>
                                Priority
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        <tr v-for="(item , index) in all_task_data" :key="item.id">
                            <td>
                                {{ index + 1 }}
                            </td>
                            <td>
                                {{ item.task_name }}
                            </td>
                            <td>
                                {{ item.date }}
                            </td>
                            <td>
                                {{ item.assignee }}
                            </td>
                            <td>
                                {{ item.sharing }}
                            </td>
                            <td>
                                {{ item.followers }}
                            </td>
                            <td>
                                {{ item.tags }}
                            </td>
                            <td>
                                {{ item.priority }}
                            </td>
                            <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-warning"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                @click="getTaskData(item.id)">
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="mb-3">
                            <input type="text" v-model="data.task_name" name="task_name" class="form-control" placeholder="Enter Task Name" required>
                        </div>
                        <div class="mb-3">
                            <textarea placeholder="Enter Task Description Here" v-model="data.task_description" class="form-control"
                                name="task_description" id="task_description" style="resize:none;">
                            </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dateandtime" > Add Date and Time :  </label>
                            <div class="form-control">
                                <input v-model="data.date" type="date" name="date" id="date" >
                                <input v-model="data.time" type="time" name="time" id="time"  >
                            </div>
                        </div>
                        <div class="mb-3" >
                            <label for="reminder" > Add a reminder :  </label>
                            <select name="reminder" id="reminder" class="form-select" v-model="data.reminder">
                            <option value="">None</option>
                            <option >5 Minutes Before</option>
                            <option >10 Minutes Before</option>
                            <option >20 Minutes Before</option>
                            <option >30 Minutes Before</option>
                            <option >1 Hours Before</option>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="assignee" > Assignee :  </label>
                            <select name="assignee" id="assignee" class="form-select" v-model="data.assignee">
                                <option v-for="item in all_member_data" :key="item.id">
                                    {{ item.name }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="sharing" > Sharing :  </label>
                            <select name="sharing" id="sharing" class="form-select" v-model="data.sharing" multiple>
                                <option v-for="item in all_member_data" :key="item.id">
                                    {{ item.name }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="followers" > Followers :  </label>
                            <select name="followers" id="followers" class="form-select" v-model="data.followers">
                                <option v-for="item in all_member_data" :key="item.id">
                                    {{ item.name }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="tags" > Tags :  </label>
                            <select name="tags" id="tags" class="form-select" v-model="data.tags">
                            <option value="">Select Tag</option>
                            <option > thihan </option>
                            <option > prakash</option>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="client_project" > Client / Project :  </label>
                            <select name="client_project" id="client_project" class="form-select" v-model="data.client_project">
                            <option value="">Select</option>
                            <option >client</option>
                            <option >project</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="priority">Priority</label><br><br>
                            <label class="radio-inline"><input type="radio" value="low" v-model="data.priority" name="priority">Low</label> &nbsp;
                            <label class="radio-inline"><input type="radio" value="normal" v-model="data.priority" name="priority">Normal  </label> &nbsp;
                            <label class="radio-inline"><input type="radio" value="high" v-model="data.priority" name="priority">High</label> &nbsp;
                        </div>

                    </form>

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
            'temp_id' : '',
            all_task_data : [],
            all_member_data: '',
            data : {
                task_name : '',
                task_description : '',
                date : '',
                time : '',
                reminder : '',
                assignee : '',
                sharing : [],
                followers : '',
                tags : '',
                client_project : '',
                priority : ''
            }
        }
    },
    mounted(){
        this.fetchAll();
        this.getTeamMembers();
    },
    methods: {
        fetchAll(){
            axios.get('/task_management')
            .then(res=>{
                // alert(res.data)
                this.all_task_data = res.data
            })
        },
        getTaskData(id){
            axios.get(`/task_management/${id}`)
            .then(res=>{
                this.data = res.data;
                this.temp_id = res.data.id;
            })
        },
        updateData(){
            axios.put(`/task_management/${this.temp_id}`, this.data )
            .then(res=>{
                alert(res.data);
                console.log(res.data);
                this.fetchAll();
            })
        },
        deleteData(id){
            axios.delete(`/task_management/${id}`)
            .then(res=>{
                console.log(res.data);
                this.fetchAll();
            })
        },
        getTeamMembers(){
            axios.get('/team_management')
            .then(res=>{
                // alert(res.data)
                this.all_member_data = res.data
            })
        }
    }
}
</script>

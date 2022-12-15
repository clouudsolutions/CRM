<template>
    <div class="container m-5">
        <h1>
            Add Task
        </h1>

        <form class="m-5 pt-5">
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
                <select name="assignee" id="assignee"
                class="form-select" v-model="data.assignee">
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

            <div class="pt-5" >
                <button type="button" class="btn btn-primary form-control" @click="addTask">
                    Add Task
                </button>
            </div>
        </form>

    </div>
</template>

<script>
export default{
    data(){
        return {
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
            },
            all_member_data : ''
        }
    },
    mounted(){
        this.getTeamMembers();
    },
    methods:{
        addTask(){
            axios.post('/task_management' , this.data )
            .then(res=>{
                console.log(res.data)
                this.$router.push({ name : 'view_task'})
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

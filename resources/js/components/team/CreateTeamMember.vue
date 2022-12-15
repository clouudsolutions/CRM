<template>
    <div class="m-5">
        <h1>
            Add Team Member
        </h1>

        <div>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="name" class="form-control" id="name"  required>
                    <div id="name" class="form-text">We'll never share your name with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" v-model="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="button" class="btn btn-primary" @click="addMember">
                    Add Member
                </button>
              </form>
        </div>
    </div>
</template>

<script>
export default{
    data(){
        return {
            'name' : '',
            'email' : ''
        }
    },
    methods:{
        addMember(){
            try {
                axios.post('/team_management', {'name' : this.name , 'email' : this.email })
                .then(res=>{
                        this.$router.push({ name : 'view_team'})
                        // alert("Data "+ this.editor_data + " sent successfully")
                })
            } catch (e) {
                console.log(e);
            }
        }
    }
}
</script>


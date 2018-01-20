<template>
    <div class="jumbotron">
        <h2>Search for a </h2>
        <input class="col-5"/>
        <button class="btn btn-primary">Search</button>
        <br>
        <ul class="list-group">
            <li v-for="user in users">
                <a @click="openModal"><profilecard :user="user"></profilecard></a>
            </li>
        </ul>
    </div>
</template>
<script>
    import ProfileCard from './ProfileCard.vue';
    import User from './User.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getAllUsers();
        },
        components:{
            'user': User
        },
        data() {
            return{
                showCard: false,
                users: null,
                errors: [],
            }
        },
        methods: {
            getAllUsers() {
                var self = this;
                axios.get('/api/users')
                    .then(response => {
                        self.users = response.data;
                    })
                    .catch(e => {
                        self.errors.push(e)
                })
            },
            openModal(){

            }
        }
    }
</script>    

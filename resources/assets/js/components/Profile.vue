<template>
    <div class="container profile-site">
        <div class="page_title row">
                <h1 class="text-center">Welcome, {{ user.username }} - </h1><h1 v-if="user.is_a_mentor">Mentor</h1><h1 v-else>Mentee</h1>
        </div>
        <ul class="nav profile-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('dashboard')">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('user')">Me</a>
            </li>
            <li class="nav-item" v-if="user.is_a_mentor">
                <a class="nav-link" href="#" @click="showSection('list')">Search Mentees</a>
            </li>    
            <li class="nav-item" v-else>
                <a class="nav-link" href="#" @click="showSection('list')">Search Mentors</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('chats')">Chats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout" >Logout</a>
            </li>
        </ul>
        <br>
        <div v-if="section == 'dashboard'">
            <div class="jumbotron">
                <h3>Chatrooms</h3>
            </div>
            <div class="jumbotron">
                <h3>Newest <template v-if="user.is_a_mentor">Mentees</template><template v-else>Mentors</template></h3>
                <ul v-if="mentors" class="row list-group">
                    <li class="list-group-item" v-for="mentor in mentors">{{ mentor.username }}</li>
                </ul>
                <ul v-else class="row list-group">
                    <li class="list-group-item" v-for="mentee in mentees">{{ mentee.username }}</li>
                </ul>
            </div>
            <div class="jumbotron">
                <h3>News</h3>
            </div> 
                  
        </div> 
        <div v-else-if="section == 'user'">
            <user :user="user" :me="true"> </user>
        </div>    
        <div v-else-if="section == 'list'">
            <list></list>
        </div>  
        <div v-else-if="section == 'chats'">
            <div class="jumbotron">
                <h3>Chats</h3>
            </div> 
        </div>  
        <div v-else>
            <div class="jumbotron">
                <h3>Oops, nothing is here.</h3>
            </div> 
        </div>  
        <div class="bottom">
            <chat></chat>
        </div>   
    </div>
</template>

<script>
    import Chat from './Chat.vue';
    import List from './List.vue';
    import User from './User.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getUser();
        },
        components:{
         'chat': Chat,
         'list': List,
         'user': User
        },
        data(){
            return{
                user: {
                    username: '',
                    email: '',
                    registerType: null
                },
                mentors:  null,
                mentees: null,
                section: 'dashboard',
                errors: []
            }
        },
        methods: {
            getUser(){
                var self = this;
                axios.get('/api/user')
                .then(response => { 
                    self.user = response.data;
                    self.user.is_a_mentor ? self.getMentees() : self.getMentors();
                })
                .catch(e => { 
                    self.errors.push(e)
                })
            },
            getMentors(){
                var self = this;
                axios.get('/api/user/mentors')
                    .then(response => {
                        self.mentors = response.data
                    })
                    .catch(e => {
                        self.errors.push(e)
                    })
            },
            getMentees(){
                var self = this;
                axios.get('/api/user/mentees')
                    .then(response => {
                        self.mentees = response.data
                    })
                    .catch(e => {
                        self.errors.push(e)
                    })
            },
            showSection(section){
                this.section = section;
            }
        }
    }
</script>
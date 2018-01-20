<template>
    <div class="container profile-site">
        <div class="page_title row">
                <h1 class="text-center">Welcome back, {{ user.username }}</h1>
        </div>
        <ul class="nav profile-nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('dashboard')">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('profilecard')">Me</a>
            </li>
            <li class="nav-item" v-if="user.registerType">
                <a class="nav-link" href="#" @click="showSection('list')">Search Mentee</a>
            </li>    
            <li class="nav-item" v-else>
                <a class="nav-link" href="#" @click="showSection('list')">Search Mentor</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('chats')">Chats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" @click="showSection('settings')">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" @click="logout">Logout</a>
            </li>
        </ul>
        <br>
        <div v-if="section == 'dashboard'">
            <div class="jumbotron">
                <h3>Chatrooms</h3>
            </div>
            <div class="jumbotron">
                <h3>Newest Mentors</h3>
            </div>
            <div class="jumbotron">
                <h3>News</h3>
            </div> 
                  
        </div> 
        <div v-else-if="section == 'settings'">
            <settings :user="user"> </settings>
        </div> 
        <div v-else-if="section == 'profilecard'">
            <profilecard :user="user"> </profilecard>
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
    import ProfileCard from './ProfileCard.vue';

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getUser();
        },
        components:{
         'chat': Chat,
         'list': List,
         'profilecard': ProfileCard,
        },
        data(){
            return{
                user: {
                    username: '',
                    email: '',
                    registerType: null
                },
                section: 'dashboard',
                errors: []
            }
        },
        methods: {
            getUser(){
                var self = this;
                axios.get('/api/user')
                .then(response => { 
                    self.user.username = response.data.username;
                    self.user.email = response.data.email;
                    self.user.registerType = response.data.registerType;
                })
                .catch(e => { 
                    self.errors.push(e)
                    console.log(this.e);
                })
            },
            showSection(section){
                this.section = section;
            }
        }
    }
</script>
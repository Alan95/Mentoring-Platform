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
                <h3>Messagebox</h3>
                <ul v-if="messages">
                    <li v-for="message in messages" class="list-group-item">
                        {{ message.sender_id.username }} wrote:
                        {{ message.message }}
                        <button class="btn btn-xs btn-violet" @click="show(message.sender_id)">Answer</button>
                    </li>
                </ul>
            </div>
            <div class="jumbotron">
                <h3>Newest <template v-if="user.is_a_mentor">Mentees</template><template v-else>Mentors</template></h3>
                <ul v-if="mentors" class="row list-group">
                    <li class="list-group-item" v-for="mentor in mentors">{{ mentor.username }} <button class="btn btn-xs btn-violet" @click="show(mentor)">Say Hi!</button></li>
                </ul>
                <ul v-else class="row list-group">
                    <li class="list-group-item" v-for="mentee in mentees">{{ mentee.username }} <button class="btn btn-xs btn-violet" @click="show(mentee)">Say Hi!</button></li>
                </ul>
            </div>
        </div>
        <div v-else-if="section == 'user'">
            <user :user="user" :me="true"> </user>
        </div>    
        <div v-else-if="section == 'list'">
            <list :user="user"></list>
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
        <modal name="hello-world" :width="250" :height="170">
            <div slot="top-right">
                <button @click="$modal.hide('foo')">
                    ❌
                </button>
            </div>
            <h3 class="text-center">Send Message</h3>
            <div class="text-center">
                <textarea v-model="messageText"></textarea>
                <button @click="sendMessage" class="btn btn-violet">Send</button>
            </div>
        </modal>
    </div>
</template>

<script>
    import List from './List.vue';
    import User from './User.vue';
    import ProfileCard from './ProfileCard';
    import VModal from 'vue-js-modal'

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getUser();
            this.getMessages();
            //this.getGroups();
        },
        components:{
         'list': List,
         'user': User,
         'profilecard': ProfileCard,
          VModal,
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
                errors: [],
                messages: null,
                clickedPerson: null,
                messageText: null,
                initialGroups: null
            }
        },
        methods: {
            getGroups(){
                var self = this;
                axios.get('groups')
                    .then(response => {
                        this.initialGroups = response.data
                    })
                    .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                    })

            },
            show(person){
                this.messageText = null
                this.clickedPerson = person
                this.$modal.show('hello-world');
            },
            hide(){
                this.$modal.hide('hello-world');
            },
            sendMessage(){
                var self = this;
                this.$modal.hide('hello-world');
                axios.post(`/api/message`, {
                    message: self.messageText,
                    from: self.user.id,
                    to: self.clickedPerson.id
                })
                    .then(response => {
                        console.log('Success!');
                    })
                    .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                    })
            },
            getMessages(){
                var self = this;
                axios.get('/api/message')
                    .then(response => {
                        self.messages = response.data;
                    })
                    .catch(e => {
                        self.errors.push(e)
                    })
            },
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
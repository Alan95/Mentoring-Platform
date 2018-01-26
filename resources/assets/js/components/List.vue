<template>
    <div class="jumbotron">
        <h2>Search for a <span v-if="user.is_a_mentor">Mentee</span> <span>Mentor</span></h2>
        <div class="row">
            <input v-model="search" class="col-11 form-control" placeholder="Enter a name ..."/>
            <select class="form-control col-5" v-model="selectedProgrammingLanguage" >
                <option  value="All" >Programming Language</option>
                <option  value="Java" > Java</option>
                <option  value="PHP"> PHP</option>
                <option value="C++" > C++</option>
                <option value="C#" > C#</option>
                <option value="HTML" > HTML</option>
                <option value="SQL" > SQL</option>
                <option value="C" > C</option>
                <option value="Ruby" > Ruby</option>
            </select>
            <select class="form-control col-5" v-model="selectedLanguage" >
                <option  value="All" >Speaking Language</option>
                <option  value="English" > English </option>
                <option  value="German" > German</option>
                <option  value="French"> French</option>
                <option value="Chinese" >Chinese</option>
                <option value="Russian" > Russian</option>
                <option value="Spanish" > Spanish</option>
            </select>
        </div>
        <br>
        <ul class="list-group row">
            <li v-for="person in filteredList">
                <a @click="show(person)" @beforeOpen="beforeOpen"><profilecard :person="person" :user="user"></profilecard></a>
            </li>
            <template v-if="filteredList && filteredList.length < 1 ">
                <h3>No Users found.</h3>
            </template>
        </ul>
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
    import ProfileCard from './ProfileCard.vue';
    import User from './User.vue';
    import VModal from 'vue-js-modal'

    export default {
        mounted() {
            console.log('Component mounted.')
            this.getAllUsers();
        },
        components:{
            VModal,
            'user': User,
        },
        props: ["user"],
        computed: {
            filteredList() {
                var self = this;
                var language = self.selectedLanguage;
                var programmingLanguage = self.selectedProgrammingLanguage;

                if(programmingLanguage === 'All' && language === 'All' && self.selectedUserType === 'All' && self.search === ''){
                    return self.users
                } else {
                    if(programmingLanguage !== 'All') {
                        return self.users.filter(user => {
                            return user.programming_languages.some(prog => {
                                return prog.name === programmingLanguage
                            })
                        })
                    }

                    if(this.search !== ''){
                        return this.users.filter(user => {
                            return user.username.toLowerCase().includes(this.search.toLowerCase()) || user.email.toLowerCase().includes(this.search.toLowerCase())
                        })
                    }

                    if(language !== 'All') {
                        return self.users.filter(user => {
                                return user.speaking_languages.some(lang => {
                                    return lang.name === language
                                })
                            })
                        }
                    }
                }
        },
        data() {
            return{
                showCard: false,
                search: '',
                users: null,
                errors: [],
                selectedLanguage: 'All',
                selectedProgrammingLanguage: 'All',
                selectedUserType: 'All',
                clickedPerson: null,
                messageText: null
            }
        },
        methods: {
            beforeOpen(event){
                console.log(event);
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
                    this.messageText = null
                })
                .catch(e => {
                    alert('Error!')
                    self.errors.push(e)
                })
            },
            getAllUsers() {
                var self = this;
                if(!self.user.is_a_mentor){
                    axios.get('/api/user/mentors')
                    .then(response => {
                        self.users = response.data;
                        self.users.forEach(function(item){
                            item.speaking_languages = JSON.parse(item.speaking_languages);
                            item.programming_languages = JSON.parse(item.programming_languages);
                        });
                    })
                    .catch(e => {
                        self.errors.push(e)
                    })
                } else {
                    axios.get('/api/user/mentees')
                        .then(response => {
                            self.users = response.data;
                            self.users.forEach(function(item){
                                item.speaking_languages = JSON.parse(item.speaking_languages);
                                item.programming_languages = JSON.parse(item.programming_languages);
                            });
                        })
                        .catch(e => {
                            self.errors.push(e)
                        })
                }
            },
        }
    }
</script>    

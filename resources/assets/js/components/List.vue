<template>
    <div class="jumbotron">
        <h2>Search for a Mentor/Mentee</h2>
        <div class="row">
            <input v-model="search" class="col-11 form-control"/>
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
                <option  value="en" >English </option>
                <option  value="ger" >German</option>
                <option value="ch" > Chinese</option>
                <option value="rus" > Russian</option>
                <option value="esp" > Spanish</option>
            </select>
        </div>
        <br>
        <ul class="list-group row">
            <li v-for="user in filteredList">
                <a @click="openModal"><profilecard :user="user"></profilecard></a>
            </li>
            <template v-if="filteredList && filteredList.length < 1 ">
                <h3>No Users found.</h3>
            </template>
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
        computed: {
            filteredList() {
                /*var self = this;
                var language = self.selectedLanguage;
                var programmingLanguage = self.selectedProgrammingLanguage;

                if(language == "All" && programmingLanguage == "All"){
                    return;
                } else {
                    return self.users.filter(user => {
                        return (language === 'All' || user.language === language) && (programmingLanguage === 'All' || user.programmingLanguage === programmingLanguage);
                    })
                }*/

                if(this.search !== ''){
                    return this.users.filter(user => {
                        return user.username.toLowerCase().includes(this.search.toLowerCase()) || user.email.toLowerCase().includes(this.search.toLowerCase())
                    })
                } else {
                    return this.users
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
                selectedProgrammingLanguage: 'All'
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

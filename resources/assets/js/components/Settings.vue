<template>
    <div class="jumbotron" style="background-color:transparent !important">
           <!-- <h1>{{ user.email }}</h1>-->
        <div class="container myProfile">
            <div class="row">
                <div class="col-md-3">
                    <label class="myProfile_label">Firstname</label>
                    <input type="text" class="input_myprofile" v-model="user.firstName">
                    <label class="myProfile_label">Lastname</label>
                    <input type="text" class="input_myprofile" v-model="editedUser.lastName">
                    <label class="myProfile_label">Username</label>
                    <input type="text" class="input_myprofile" :value="user.username" readonly>
                    <label class="myProfile_label">Email</label>
                    <input type="text" class="input_myprofile" :value="user.email">
                    <label class="myProfile_label">Password</label>
                    <input type="password" class="input_myprofile" :value='user.password'>
                    <input type="button" class="button_myprofile btn-block btn-xs" value="Change Password">
                </div>
                <div class="col-md-6">
                    <label class=myProfile_label>Programming languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="programmingLanguage in programmingLanguages"><input type="checkbox" :id="programmingLanguage.name" :value="programmingLanguage.name" v-model="selectedProgrammingLanguages" @click="arrayOfCheckedProgrammingLanguages($event)">{{ programmingLanguage.name }}</td>
                            </tr>
                           <div>{{selectedProgrammingLanguages}}</div>
                        </tbody>
                    </table>
                    <label class=myProfile_label>Spoken languages</label>
                   <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="speakingLanguage in speakingLanguages"><input type="checkbox" :id="speakingLanguage.name" :value="speakingLanguage.name" v-model="selectedSpeakingLanguages" @click="arrayOfCheckedSpeakingLanguages">{{ speakingLanguage.name }}</td>
                            </tr>
                           <!-- <div>{{selectedSpeakingLanguages}}</div>-->
                        </tbody>
                    </table>
                    <label class=myProfile_label>I have place for...mentees</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(numberOfMentee, ind) in numberOfmentees"><input type="radio" :value="numberOfMentee" v-model="checkedNumberOfMentees">{{ numberOfMentee.name }}</td>
                            </tr>
                            <!--<div>{{checkedNumberOfMentees.name}}</div>-->
                        </tbody>
                    </table>                      

                </div>

                <div class="col-md-3" style="position:relativ">
                    <div class="row avatarBox">
                            <div v-if="!image">
                                    <p class="label">Upload your Avatar</p>
                                    <input type="file" class="button_myprofile btn-block btn-xs" @change="onFileChange">
                            </div>
                            <div v-else>
                                <img :src="image" />
                                <button @click="removeImage" class="button_myprofile btn-block btn-xs">Change Avatar</button>
                            </div> 
                    </div>
                    <div class="row">
                        <input @click="updateUser" class="button_myprofile btn-block btn-xs saveSettings" value="Save settings" />
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
</template> 

<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        },
       props: ["user"],
        data() {
            return{
                user: {
                    firstname: '',
                },
                editedUser: {
                    checkedSpeakingLanguages: [],
                    checkedProgrammingLanguages: [],
                    firstName: '',
                    lastName: '',
                    username: '',
                    password: '',
                },
                programmingLanguages: [
                    {name: 'Java', checked: false},
                    {name: 'PHP', checked: false},
                    {name: 'C++', checked: false},
                    {name: 'C#', checked: false},
                    {name: 'HTML', checked: false},
                    {name: 'SQL', checked: false},
                    {name: 'C', checked: false},
                    {name: 'Ruby', checked: false}
                ],
                checkedProgrammingLanguages: [], 
                speakingLanguages: [
                    {name: 'English'},
                    {name: 'German'},
                    {name: 'French'},
                    {name: 'Chinese'},
                    {name: 'Russian'},
                    {name: 'Spanish'},               
                ],
                checkedSpeakingLanguages: [],
                numberOfmentees:[
                    {name:'One', checked: false},
                    {name:'Two', checked: false},
                    {name:'Three', checked: false},
                    {name:'Four', checked: false},
                    {name:'Five', checked: false},
                    {name:'Six', checked: false},
                    {name:'Seven', checked: false},
                    {name:'Eight', checked: false},

                ], 
                checkedNumberOfMentees: [],     

                image: '',
            }
        },
        created(){
            
        },        
        methods: {
            getLanguage(){
                axios.get('/api/language')
                .then( response =>
                { this.languages = response.data.programming_languages })
            },
            onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
            },
            createImage(file) {
            var image = new Image();
            var reader = new FileReader();
            var vm = this;

            reader.onload = (e) => {
                vm.image = e.target.result;
            };
            reader.readAsDataURL(file);
            },
            removeImage: function (e) {
            this.image = '';
            },   
            arrayOfCheckedProgrammingLanguages: function(e) {
                var self = this;
                if (e.target.checked) {
                self.checkedProgrammingLanguages.push(e.target.value);
                }
            },
            arrayOfCheckedSpeakingLanguages: function(e) {
                var self = this;
                if (e.target.checked) {
                self.checkedSpeakingLanguages.push(e.target.value);
                }
            },
            /*showLog(){
                var self = this;
                var firstname = self.user.firstName;
                var lastname = self.editedUser.lastName;
                var email = self.user.email;
                var password = self.user.password;
                var programming_languages = self.checkedProgrammingLanguages;
                var speaking_languages = self.checkedSpeakingLanguages; 
                console.log(firstname, lastname, email, programming_languages, speaking_languages);
            },*/
            updateUser(){
                var self = this;
                axios.post(`/api/update`, {
                        firstname: self.user.firstName,
                        lastname: self.editedUser.lastName,
                        email: self.user.email,
                        password: self.user.password,
                        programming_languages: self.checkedProgrammingLanguages,
                        speaking_languages: self.checkedSpeakingLanguages,
                    })
                    .then(response => {
                    alert("one step forward");
                })
                .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                })
            },                                  
        },
    }        
    
</script>
<template>
    <div class="jumbotron" style="background-color:transparent !important">
           <!-- <h1>{{ user.email }}</h1>-->
        <div class="container myProfile">
            <div class="row">
                <div class="col-md-3">
                    <label class="myProfile_label">Firstname</label>
                    <input type="text" class="input_myprofile">
                    <label class="myProfile_label">Lastname</label>
                    <input type="text" class="input_myprofile">
                    <label class="myProfile_label">Username</label>
                    <input type="text" class="input_myprofile" :value="user.username" readonly>
                    <label class="myProfile_label">Email</label>
                    <input type="text" class="input_myprofile" :value="user.email">
                    <label class="myProfile_label">Password</label>
                    <input type="text" class="input_myprofile" :value="user.password">
                    <input type="button" class="button_myprofile btn-block btn-xs" value="Change Password">
                </div>
                <div class="col-md-3">
                    <label class=myProfile_label>Programming languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(programmingLanguage, ind) in programmingLanguages"><input type="checkbox" class="myProfile_label" value="programmingLanguage.checked" v-model="programmingLanguage.checked">{{ programmingLanguage.name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <label class=myProfile_label>Spoken languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(speakingLanguage, ind) in speakingLanguages"><input type="checkbox" value="speakingLanguage.checked" v-model="speakingLanguage.checked">{{ speakingLanguage.name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <label class=myProfile_label>I have place for...mentees</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(numberOfMentee, ind) in numberOfmentees"><input type="checkbox" value="numberOfMentee.checked" v-model="numberOfMentee.checked">{{ numberOfMentee.name }}</td>
                            </tr>
                        </tbody>
                    </table>                      

                </div>
                <div class="col-md-3">                      
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
                        <button @click="saveSettings" class="button_myprofile btn-block btn-xs saveSettings">Save settings</button>
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
                timeZoneVisible: false,

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
                speakingLanguages: [
                    {name: 'English', checked: false},
                    {name: 'German', checked: false},
                    {name: 'French', checked: false},
                    {name: 'Chinese', checked: false},
                    {name: 'Russian', checked: false},
                    {name: 'Spanish', checked: false},
                ],
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
                editedUser: {
                    programmingLanguages: []        
                },
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
    }
        }
    }        
    
</script>
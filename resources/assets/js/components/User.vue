<template>
    <div class="jumbotron">
        <div class="pull-right">
            <button v-if="me" @click="toggleEditable">Edit</button>
        </div>
        <div class="container myProfile">
            <div class="row">
                <div class="col-md-3">
                    <label class="myProfile_label">Firstname</label>
                    <input v-if="editable" type="text" class="input_myprofile" v-model="user.first_name"><span v-else>{{ user.first_name }}</span>
                    <label class="myProfile_label">Lastname</label>
                    <input v-if="editable" type="text" class="input_myprofile" v-model="user.last_name"><span v-else>{{ user.last_name }}</span>
                    <label class="myProfile_label">Username</label>
                    <input v-if="editable" type="text" class="input_myprofile" :value="user.username" readonly><span v-else>{{ user.username }}</span>
                    <label class="myProfile_label">Email</label>
                    <input v-if="editable"type="text" class="input_myprofile" :value="user.email"><span v-else>{{ user.email }}</span>
                    <label class="myProfile_label">Password</label>
                    <input v-if="editable" type="password" class="input_myprofile" :value='user.password'><span v-else>{{ user.password }}</span>
                </div>
                <div class="col-md-6">
                    <label class=myProfile_label>Programming languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-if="editable" v-for="programmingLanguage in programmingLanguages">
                                    <input type="checkbox" :id="programmingLanguage.name" :value="programmingLanguage.name" v-model="programmingLanguage.checked">{{ programmingLanguage.name }}
                                </td>
                                <td v-else>
                                    {{ programmingLanguage.name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label class=myProfile_label>Spoken languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-if="editable" v-for="speakingLanguage in speakingLanguages">
                                    <input v-if="editable" type="checkbox" :id="speakingLanguage.name" :value="speakingLanguage.name" v-model="speakingLanguage.checked">{{ speakingLanguage.name }}
                                </td>
                                <td v-else>
                                    {{ speakingLanguage.name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <template v-if="user.is_a_mentor">
                        <label class=myProfile_label>I have place for...mentees</label>
                        <input v-if="editable" type="number" v-model="numberOfMentees"><span v-else v-if="numberOfMentees !== null">{{ numberOfMentees }}</span>
                    </template>
                </div>
                <div v-if="editable" class="col-md-3 pull-right" style="position:relativ">
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
                    <div class="row" v-if="editable">
                        <button @click="updateUser" class="button_myprofile btn-block btn-xs saveSettings">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        mounted() {
        },
        props: ["user", "me"],
        data() {
            return{
                showCard: false,
                editable: false,
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
                numberOfMentees: null,
                image: '',
                errors: []
            }
        },
        methods: {
                toggleEditable(){
                    this.editable = !this.editable;
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
                updateUser() {
                    var self = this;
                    var selectedProgrammingLanguages = self.programmingLanguages.filter(language => {
                        return language.checked
                    });

                    var selectedSpeakingLanguages = self.speakingLanguages.filter(language => {
                        return language.checked
                    });
                    axios.post(`/api/update/user`, {
                        firstname: self.user.first_name,
                        lastname: self.user.last_name,
                        email: self.user.email,
                        password: self.user.password,
                        programming_languages: selectedProgrammingLanguages,
                        speaking_languages: selectedSpeakingLanguages
                    })
                    .then(response => {
                        alert("Your changes have been updated and saved ");
                        self.editable = false;
                    })
                    .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                    })
                }
         }

    }
</script>
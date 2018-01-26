<template>
    <div class="jumbotron">
        <div class="pull-right">
            <button v-if="me" class="btn btn-violet"@click="toggleEditable">Edit</button>
        </div>
        <div class="container myProfile">
            <div class="row">
                <div class="cardHeader col-md-5 text-center">
                    <a class="img" href="#">
                        <img v-if="imageUrl" :src="imageUrl">
                        <img v-else src="http://www.pieglobal.com/wp-content/uploads/2015/10/placeholder-user.png" >
                    </a>
                    <button class="btn btn-violet" @click="onPickFile">Upload Picture</button>
                    <input @change="onFilePicked" type="file" style="display: none" ref="fileInput" accept="image/*">
                </div>
                <div class="col-md-3">
                    <label class="myProfile_label">Firstname</label>
                    <input v-if="editable" type="text" class="input_myprofile form-control" v-model="user.first_name"><span v-else><template v-if="user.first_name == '' || user.first_name == null">-</template><template v-else>{{ user.first_name }}</template></span>
                    <label class="myProfile_label">Lastname</label>
                    <input v-if="editable" type="text" class="input_myprofile form-control" v-model="user.last_name"><span v-else><template v-if="user.last_name == '' || user.last_name == null">-</template><template v-else>{{ user.last_name }}</template></span>
                    <label class="myProfile_label">Username</label>
                    <input v-if="editable" type="text" class="input_myprofile form-control" :value="user.username" readonly><span v-else>{{ user.username }}</span>
                    <label class="myProfile_label">Email</label>
                    <input v-if="editable"type="text" class="input_myprofile form-control" :value="user.email"><span v-else>{{ user.email }}</span>
                    <label class="myProfile_label">Password</label>
                    <!--<input v-if="editable" type="password" class="input_myprofile" :value='user.password'><span v-else>{{ user.password }}</span>-->
                    <button class="btn btn-violet" v-if="!changePasswords" @click="changePasswords = !changePasswords">Change Password</button>
                    <template v-else>
                        <label>New Password</label>
                        <input class="form-control" type="password" v-model="newPassword">
                        <label>Confirm Password</label>
                        <input class="form-control" type="password" v-model="newPasswordConfirm">
                        <button class="btn btn-violet" @click="changePassword">Save</button>
                    </template>
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
                                    <template v-if="programmingLanguage.checked">{{ programmingLanguage.name }}</template>
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
                                    <template v-if="speakingLanguage.checked">{{ speakingLanguage.name }}</template>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-if="editable" class="col-md-12">
                    <br>
                    <div v-if="editable">
                        <button @click="updateUser" class="btn btn-block btn-violet btn-xs saveSettings">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        created() {
            this.changeSelectOptions()
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
                image: null,
                errors: [],
                imageUrl: '',
                changePasswords: false,
                newPassword: '',
                newPasswordConfirm: ''
            }
        },
        methods: {
                changeSelectOptions(){
                  var self = this;
                  self.programmingLanguages.forEach(function(item) {
                      JSON.parse(self.user.programming_languages).forEach(function(useritem){
                          if(item.name === useritem.name){
                              item.checked = true;
                          }
                      });
                  });

                  self.speakingLanguages.forEach(function(item){
                      JSON.parse(self.user.speaking_languages).forEach(function(useritem){
                          if(item.name === useritem.name){
                              item.checked = true;
                          }
                      });
                  });
                },
                toggleEditable(){
                    this.editable = !this.editable;
                },
                onPickFile() {
                  this.$refs.fileInput.click()

                },
                onFilePicked(event) {
                    var files = event.target.files;
                    var filename = files[0].name;
                    if (filename.lastIndexOf('.') <= 0){
                        return alert('Please add a valid file!')
                    }
                    var fileReader = new FileReader()
                    fileReader.addEventListener('load', () => {
                      this.imageUrl = fileReader.result
                    })
                    fileReader.readAsDataURL(files[0])
                    this.image = files[0]
                    this.uploadImage()
                },
                uploadImage(){
                    var self = this;
                    axios.post('/api/image', {
                        image: self.image,
                        user: self.user.id
                    })
                    .then(response => {

                    })
                    .catch(e => {
                        alert('Error!')
                    })
                },
                changePassword() {
                   var self = this
                   if(self.newPassword === self.newPasswordConfirm){
                       axios.post('/api/password', {
                           password: self.password,
                           user: self.user.id
                       })
                       .then(response => {
                           self.changePasswords = false
                           alert("Saved")
                       }).catch(e => {
                           alert('Error!')
                           self.errors.push(e)
                       })
                   }
                },
                updateUser() {
                    var self = this;
                    var selectedProgrammingLanguages = self.programmingLanguages.filter(language => {
                        return language.checked
                    });
                    selectedProgrammingLanguages.forEach(function(v){ delete v.checked });
                    var selectedSpeakingLanguages = self.speakingLanguages.filter(language => {
                        return language.checked
                    });
                    selectedSpeakingLanguages.forEach(function(v){ delete v.checked });
                    axios.post(`/api/update/user`, {
                        firstname: self.user.first_name,
                        lastname: self.user.last_name,
                        email: self.user.email,
                        password: self.user.password,
                        programming_languages: selectedProgrammingLanguages,
                        speaking_languages: selectedSpeakingLanguages,
                    })
                    .then(response => {
                        self.editable = false;
                        alert("Saved")
                    })
                    .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                    })
                }
         }

    }
</script>
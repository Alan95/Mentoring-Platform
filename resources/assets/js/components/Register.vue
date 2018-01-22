<template>
        <div class="container">
            <div class="page_title row">
                <div class="col-2">
                    <a href="/"><span class="fa fa-arrow-left" aria-hidden="true"></span></a>
                </div>
                <div class="offset-2 col-4">
                    <h1 class="text-center">Sign up for free</h1>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-6 form_wrapper">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control-plaintext" v-model="user.username" placeholder="Username*">
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-user icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                        <div class="row">
                        <div class="col-md-8">
                            <input type="email" v-model="user.email" class="form-control-plaintext" placeholder="Email*">
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-envelope-open-o icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="password" class="form-control-plaintext" v-model="user.password" placeholder="Password*">
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-key icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="password" v-model="user.confirmedPassword" class="form-control-plaintext" placeholder="Confirm Password*">
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-key icon_right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <hr class="horisontal_line">
                    <select v-model="user.registerType" class="form-control">
                        <option  value="mentor">Mentor</option>
                        <option  value="mentee">Mentee</option>
                    </select> 
                    <hr class="horisontal_line space_between">
                    <p class="register_text">Do you already have an account?<br>
                        <a href="/login"><span class="login_label">Login here</span></a></p>

                </div> 
                <div class=" col-md-6 form_wrapper">
                        <div class="reg-label">
                                Programming languages of interest:
                            </div>
                            <ul class="register">  
                                <li v-for="programmingLanguage in programmingLanguages">
                                    <input type="checkbox" :id="programmingLanguage.name" :value="programmingLanguage.name" v-model="programmingLanguage.checked">{{ programmingLanguage.name }}
                                </li>
                            </ul>
                            <hr class="horisontal_line space_between">
                        <div class="reg-label">
                                I would like to communicate in:
                            </div>
                            <ul class="register">
                                    
                                <li v-for="speakingLanguage in speakingLanguages">
                                    <input type="checkbox" :id="speakingLanguage.name" :value="speakingLanguage.name" v-model="speakingLanguage.checked">{{ speakingLanguage.name }}
                                </li>
                            </ul>
                            <hr class="horisontal_line space_between">                  
                            <div class="g-recaptcha" data-sitekey="6Les2T4UAAAAAKTY_F0SjXtjfgrDbc8lwKLpLaoG"></div>
                        
                            <input @click="registerUser" id="signUp" class="btn btn-light btn-block" value="Sign up"/>

                </div>
            </div> 
        </div>
</template>

<script>
    export default {
        mounted() {
            this.user.registerType = this.type;
        },
        props: ["type"],
        data(){
            return{
                user: {
                    username: '',
                    email: '',
                    password: '',
                    confirmedPassword: '',
                    registerType: '',
                    programming_languages: [], 
                    selectedProgrammingLanguages: [],   
                },
                errors: [],
                programmingLanguages: [
                    {name: 'Java', checked: false},
                    {name: 'PHP', checked: false},
                    {name: 'C++', checked: false},
                    {name: 'C#', checked: false},
                    {name: 'HTML', checked: false},
                    {name: 'Ruby', checked: false},
                    {name: 'SQL', checked: false},
                    {name: 'C', checked: false},
                ],
                speakingLanguages: [
                    {name: 'English', checked: false},
                    {name: 'German', checked: false},
                    {name: 'French', checked: false},
                    {name: 'Chinese', checked: false},
                    {name: 'Russian', checked: false},
                    {name: 'Spanish', checked: false},
                ],
            }
        },
        methods: {
            registerUser(){
                var self = this;
                var selectedProgrammingLanguages = self.programmingLanguages.filter(language => {
                        return language.checked
                    });
                var selectedSpeakingLanguages = self.speakingLanguages.filter(language => {
                    return language.checked
                });
                if(self.user.password == self.user.confirmedPassword){
                    axios.post(`/api/register`, {
                        username: self.user.username,
                        email: self.user.email,
                        password: self.user.password,
                        registerType: self.user.registerType,
                        programming_languages: selectedProgrammingLanguages,
                        speaking_languages: selectedSpeakingLanguages,  
                          
                    })
                    .then(response => {
                        self.changePath('/profile');
                    })
                    .catch(e => {
                        alert('Error!')
                        self.errors.push(e)
                    })        
                } else {
                    alert('Password not same');
                }
            },
            changePath(path){
                document.location.href = location.protocol + '//' + location.host + path
            },
            showSection(section){
                this.section = section;
            }
        }
    }
</script>

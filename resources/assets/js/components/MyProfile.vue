<template>
    <div class="jumbotron" style="background-color:transparent !important">
        <div class="container myProfile">
            <div class="row">
                <div class="col-md-3">
                    <label class="myProfile_label">Firstname</label>
                    <input type="text" class="input_myprofile">
                    <label class="myProfile_label">Lastname</label>
                    <input type="text" class="input_myprofile">
                    <label class="myProfile_label">Username</label>
                    <input type="text" class="input_myprofile">
                    <label class="myProfile_label">Email</label>
                    <input type="text" class="input_myprofile">
                    <label class="myProfile_label">Password</label>
                    <input type="text" class="input_myprofile">
                    <input type="button" class="button_myprofile btn-block btn-xs" value="Change Password">
                    <label class="myProfile_label">Hometown</label>
                </div>
                <div class="col-md-3">
                    <label class=myProfile_label>Programming languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td v-for="(programmingLanguage, ind) in programmingLanguages"><input type="checkbox" value="programmingLanguage.checked" v-model="programmingLanguage.checked">{{ programmingLanguage.name }}</td>
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

                </div>
                <div class="col-md-3">
                        <label class="myProfile_label">How many mentees?</label>
                    <div class="row justify-content-between">
                        <div class="col-3">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                        <div class="col-3">
                           <input type="checkbox">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-3">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                        <div class="col-3">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>                            
                        <div class="col-3 col-offset-6">
                            <input type="checkbox">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                            <div class="col-3">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>
                            <div class="col-3">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>
                            <div class="col-3">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </div>                                                        
                            <div class="col-3">
                                <input type="checkbox">
                            </div>   
                        </div>                          
                </div>

                <div class="col-md-3">
                        
                    <h1>trying to upload avatar, not working just yet</h1>
                    <!--<i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                        <form id="uploadAvatar" action="{{ URL::to('uploadAvatar') }}" method="post" enctype="multipart/form-data">
                            <label>Select image to upload:</label>
                            <input type="file" name="file" id="file">
                            <input type="submit" value="Upload" name="submit">
                            <input type="hidden" name="_token" :value="csrf">                        
                        </form>-->
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
                user: {
                    programmingLanguages: []        
                }
                
                
            }
        },
        created(){
            this.getLanguage();
        },        
        methods: {
            getLanguage(){
                axios.get('/api/language')
                .then( response =>
                { this.languages = response.data.programming_languages })
            }

        }


        
    }
</script>
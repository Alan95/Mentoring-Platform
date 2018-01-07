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
                    <div class="dropdown">
                        <button class="button_myprofile btn-block btn-xs dropdown-toggle" v-on:click="timeZoneVisible = !timeZoneVisible">
                            Timezone
                        </button>
                        <ul class="dropdown-menu" v-show="timeZoneVisible">
                                <li><a>Timezone 1</a></li>
                                <li><a>Timezone 2</a></li>
                                <li><a>Timezone 3</a></li>
                        </ul>                        
                    </div>                                      
                </div>
                <div class="col-md-3">
                    <label class=myProfile_label>Programming languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <!--<tr v-for="language in languages">
                                    <td>{{ language.name }}</td>-->
                                <td>trying to dynamicaly generate them - </td>
                            </tr>

                        </tbody>
                    </table>
                    <label class=myProfile_label>Spoken languages</label>
                    <table class="table table-stripped">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td>trying to dynamicaly generate them</td>
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
                languages: [],
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
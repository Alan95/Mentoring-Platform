<template>
    <!--<div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card hovercard">
                        <div class="cardheader">
        
                        </div>
                        <div class="avatar">
                            <img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR847W2CKaHWeekeI8jVGAr19XqgqLj-wSGRt74sLrOsGEu7LrY">
                        </div>
                        <div class="info">
                            <div class="title">
                                <p target="_blank">{{ user.username}}</p>
                            </div>
                            <div class="desc">Passion:{{ selectedProgrammingLanguages}}</div>
                            <div class="desc">Curious developer</div>
                            <div class="desc">Tech geek</div>
                        </div>
                        <div class="bottom">
                            <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" rel="publisher"
                                href="https://plus.google.com/+ahmshahnuralam">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" rel="publisher"
                                href="https://plus.google.com/shahnuralam">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                                <i class="fa fa-behance"></i>
                            </a>
                            <template v-if="!me">
                                <button>Chat Now</button>
                                <button>Send Friend Request</button>
                            </template>
                        </div>
                    </div>
        
                </div>
        
            </div>
        </div>-->

        <div class="card_wrapper">
                <div class="cardHeader">   
                    <a class="img" href="#">
                        <img src="https://0.soompi.io/wp-content/uploads/2017/06/13023028/TWICE-Mina.jpg"/>
                    </a>
                </div>
                <div class="cardBody">
                    <div class="cardTitle"><h2 align="center">{{ user.username }}</h2></div>
                    <hr class="horisontal_line space_between">
                    <div class="cardLabel">
                        <p v-if="user.programming_languages">Speaking: <span class="cardContent"><span v-for="prog in user.programming_languages">{{ prog.name }} </span></span></p>
                        <p v-else>No Programming Language selected</p>
                        <p v-if="user.speaking_languages">And also: <span class="cardContent"><span v-for="speaky in user.speaking_languages">{{ speaky.name }} </span></span></p>
                        <p v-else>No Speaking Language selected</p>
                    </div>
                    <hr class="horisontal_line space_between" style="margin-bottom:5px">
            </div>
                <div class="cardFooter">
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-snapchat-ghost"></a>
                    <div class="contactButtons">
                    <template v-if="!me">
                        <p>
                            <input type="button" class="btn btn-default btn-sm" value="Chat Now"></input>
                            <input type="button" class="btn btn-default btn-sm" value="Send Friend Request"></input>
                        </p>
                    </template>
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
                showCard: false
            }
        },
        methods: {

        }
    }
</script>  
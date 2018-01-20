<template>
    <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
        
                    <div class="card hovercard">
                        <div class="cardheader">
        
                        </div>
                        <div class="avatar">
                            <img alt="" src="https://www.emetriq.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png">
                        </div>
                        <div class="info">
                            <div class="title">
                                <p target="_blank">{{ user.username}}</p>
                            </div>
                            <div class="desc">Passion:</div>
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
<template>
    <div class="panel panel-chat" v-if="showChat">
        <div class="panel-heading" @click="toggleChat">
            <b class="chatMinimize">Max Mustermann</b>
            <div class="clearFix"></div>
        </div>
        <div class="panel-body">
            <div class="messageMe">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
                <div class="clearFix"></div>
            </div>
            <div class="messageHer">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
                <div class="clearFix"></div>
            </div>
            <div class="messageMe">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
                <div class="clearFix"></div>
            </div>
            <div class="messageHer">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
                <div class="clearFix"></div>
            </div>
            <div class="messageMe">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
                <div class="clearFix"></div>
            </div>
            <div class="messageHer">
                <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
                <div class="clearFix"></div>
            </div>
            <div class="clearFix"></div>
        </div>
        <div class="panel-footer">
            <textarea name="textMessage" cols="0" rows="0"></textarea>
        </div>
    </div>
    <div v-else class="panel panel-chat closed">
        <div class="panel-heading" @click="toggleChat">
            <h3 class="chatMinimize"<span>Max Mustermann</span></h3>
            <div class="clearFix"></div>
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
                showChat: true
            }
        },
        methods: {
            toggleChat(){
                this.showChat == true ? this.showChat = false : this.showChat = true;
            }
        }
    }
</script>
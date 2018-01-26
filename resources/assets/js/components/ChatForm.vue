<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="chat" class="form-control input-sm" placeholder="Type your chat here..." v-model="newChat" @keyup.enter="sendChat">

        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendChat">
                Send
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newChat: ''
            }
        },

        methods: {
            sendChat() {
                console.log('y');
                this.$emit('chatsent', {
                    user: this.user,
                    chat: this.newChat
                });

                this.newChat = ''
            }
        }
    }
</script>
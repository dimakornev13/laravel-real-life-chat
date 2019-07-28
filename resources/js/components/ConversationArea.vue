<template>
    <div class="conversation-area col-12 col-md-7">
        <h2 class="title-conversation">{{ current ? current.name : 'Select current' }}</h2>

        <div class="message-feed" id="msgWrapper">
            <ul v-if="current" class="list-unstyled">
                <li v-for="message in messages" :key="message.id" :class="`${ message.to === current.id ? '' : 'text-right' }`">
                    <div>
                        <small>{{ message.created_at }}</small>
                    </div>
                    <div :class="`msg-box alert ${ message.to === current.id ? 'alert-primary' : 'alert-secondary' }`">
                        {{ message.msg }}
                    </div>
                </li>
            </ul>
        </div>

        <div class="composer" v-show="current.id !== 0">
            <textarea v-model="msg" @keyup.ctrl.enter="sendMessage" class="form-control text-area" placeholder="Message..."></textarea>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapState, mapGetters} from 'vuex';

    export default {
        data(){
            return {
                msg: ''
            }
        },

        computed: {
            ...mapState({
                current: state => state.contactList.current,
                messages: state => state.conversation.messages,
            })
        },

        methods: {
            sendMessage: function () {
                this.$store.dispatch('sendMessageA', this.msg);

                this.msg = ''
            }
        }
    }
</script>

<style scoped>
    .title-conversation{
        border-bottom: 1px dashed lightgrey;
    }

    .message-feed{
        max-height: 58vh;
        overflow-x: hidden;
        overflow-y: scroll;
        margin-bottom: 20px;
    }

    .msg-box{
        width: 60%;
        display: inline-block;
    }

    .text-area{
        width: 100%;
        min-height: 150px;
        resize: none;
    }
</style>
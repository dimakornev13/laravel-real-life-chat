<template>
    <div class="message-feed" ref="msgWrapper">
        <ul v-if="contact" class="list-unstyled">
            <li v-for="message in messages" :key="message.id" :class="`${ message.to == contact.id ? '' : 'text-right' }`">
                <div>
                    <small>{{ message.created_at }}</small>
                </div>
                <div :class="`msg-box alert ${ message.to == contact.id ? 'alert-primary' : 'alert-secondary' }`">
                    {{ message.msg }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contact: {
                type: Object,
            },
            messages: {
                type: Array,
                required: true
            }
        },

        methods:{
            scrollBottom(){
                setTimeout(()=>{
                    this.$refs.msgWrapper.scrollTop = this.$refs.msgWrapper.scrollHeight;
                }, 50);
            }
        },

        watch:{
            contact(contact){
                this.scrollBottom();
            },
            messages(messages){
                this.scrollBottom();
            }
        }
    }
</script>

<style scoped>
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
</style>
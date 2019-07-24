<template>
    <div class="conversation-area col-12 col-md-7">
        <h2 class="title-conversation">{{ contact ? contact.name : 'Select contact' }}</h2>
        <MessageFeed :contact="contact" :messages="messages"></MessageFeed>
        <MessageComposer v-show="contact" @send="sendMessage"></MessageComposer>
    </div>
</template>

<script>
    import MessageFeed from './MessageFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },

        methods: {
            sendMessage(msg){
                if(!this.contact)
                    return;

                axios.post(`/api/conversation/send/${this.contact.id}`, {
                    msg: msg
                }).then((response)=>{
                    this.$emit('newMessageSent', response.data);
                })
            },
        },

        components: {MessageFeed, MessageComposer}
    }
</script>

<style scoped>
    .title-conversation{
        border-bottom: 1px dashed lightgrey;
    }
</style>
<template>
    <div class="conversation-area col-12 col-md-8">
        <h2>{{ contact ? contact.name : 'Select contact' }}</h2>
        <MessageFeed :contact="contact" :messages="messages"></MessageFeed>
        <MessageComposer @send="sendMessage"></MessageComposer>
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
                console.log(msg);
            },
        },

        components: {MessageFeed, MessageComposer}
    }
</script>

<style scoped>

</style>
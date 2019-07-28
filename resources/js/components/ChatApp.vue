<template>
    <div class="chat-app row">
        <ConversationArea></ConversationArea>
        <ContactListArea></ContactListArea>
    </div>
</template>

<script>
    import ConversationArea from './ConversationArea';
    import ContactListArea from './ContactListArea';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },

        mounted() {

            this.$store.dispatch('setUserA', this.user);

            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e)=>{
                    this.handleIncoming(e.message);
                });
        },

        components: {ContactListArea, ConversationArea},

        methods: {
            handleIncoming(message){
                this.$store.dispatch('incomingMessage', message);
                this.$store.dispatch('updateUnreadIncomingMessage', message)
            },

        }
    }
</script>

<style scoped>

</style>
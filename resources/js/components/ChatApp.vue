<template>
    <div class="chat-app row">
        <ConversationArea :contact="selectedContact" :messages="messages" @newMessageSent="saveNewMessage"></ConversationArea>
        <ContactListArea :contacts="contacts" @selectedContact="startConversation"></ContactListArea>
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

        data(){
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            }
        },

        mounted() {
            let context = this;

            axios.get('/api/contacts')
                .then((response) => {
                    context.contacts = response.data;
                });
        },

        components: {ConversationArea, ContactListArea},

        methods: {
            startConversation(contact){
                axios.get(`/api/conversation/${contact.id}`)
                    .then((response)=>{
                        this.messages = response.data;

                        this.selectedContact = contact;
                    })
            },

            saveNewMessage(msgObject){
                this.messages.push(msgObject);
            }
        }
    }
</script>

<style scoped>

</style>
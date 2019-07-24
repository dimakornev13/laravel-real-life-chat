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
            // let context = this;

            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e)=>{
                    this.handleIncoming(e.message);
                });

            axios.get('/api/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });
        },

        components: {ConversationArea, ContactListArea},

        methods: {
            startConversation(contact){
                this.updateUnread(contact, true);

                axios.get(`/api/conversation/${contact.id}`)
                    .then((response)=>{
                        this.messages = response.data;

                        this.selectedContact = contact;
                    })
            },

            saveNewMessage(msgObject){
                this.messages.push(msgObject);
            },

            handleIncoming(message){
                if(this.selectedContact && message.from === this.selectedContact.id){
                    this.saveNewMessage(message);
                    return;
                }

                let contact = this.contacts.filter((single)=>{
                    return single.id === message.from;
                })[0];

                this.updateUnread(contact);
            },

            updateUnread(contact, reset = false){
                this.contacts = this.contacts.map((single)=>{
                    if(single.id !== contact.id)
                        return single;

                    single.unread = reset ? 0 : single.unread + 1;

                    return single
                })
            }
        }
    }
</script>

<style scoped>

</style>
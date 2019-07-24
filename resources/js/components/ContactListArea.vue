<template>
    <div class="contacts-area col-12 col-md-4">
        <ul class="list-group">
            <li class="list-group-item row" v-for="contact in contacts" :key="contact.id" @click="selectContact(contact)">
                <div class="contact-avatar col-4">
                    <img :src="contact.avatar" :alt="contact.name" class="img-responsive rounded-circle">
                </div>
                <div class="contact-wrap col-8">
                    <p class="contact-name">{{ contact.name }}</p>
                    <p class="contact-email">{{ contact.email }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },

        data(){
            return {
                selected: null
            }
        },

        methods: {
            selectContact(contact){
                this.selected = contact;

                this.$emit('selectedContact', contact);
            }
        },

        // watch: {
        //     contacts(newContacts){
        //
        //         console.log(newContacts);
        //         return newContacts;
        //     }
        // }
    }
</script>

<style scoped>

</style>
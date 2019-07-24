<template>
    <div class="contacts-area col-12 col-md-4">
        <ul class="list-group">
            <li class="list-group-item row d-flex align-items-center pointer" v-for="contact in contacts" :key="contact.id" @click="selectContact(contact)"
                :class="{active: selected.id == contact.id}">
                <div class="contact-avatar col-3">
                    <img :src="contact.avatar" :alt="contact.name" class="img-responsive rounded-circle">
                </div>
                <div class="contact-wrap col-9">
                    <p class="contact-name"><b>{{ contact.name }}</b></p>
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
                selected: {
                    id: 0
                }
            }
        },

        methods: {
            selectContact(contact){
                this.selected = contact;

                this.$emit('selectedContact', contact);
            }
        },
    }
</script>

<style scoped>

</style>
<template>
    <div class="contacts-area col-12 col-md-5">
        <ul class="list-group">
            <li class="list-group-item row d-flex align-items-center pointer" v-for="contact in sortedContacts" :key="contact.id" @click="setCurrent(contact)"
                :class="{active: current.id === contact.id}">
                <div class="contact-avatar col-3">
                    <img :src="contact.avatar" :alt="contact.name" class="img-responsive rounded-circle">
                </div>
                <div class="contact-wrap col-7">
                    <p class="contact-name"><b>{{ contact.name }}</b></p>
                    <p class="contact-email">{{ contact.email }}</p>
                </div>
                <div class="col-2">
                    <span class="badge badge-primary badge-pill" v-if="contact.unread">{{ contact.unread }}</span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters, mapState, mapActions} from 'vuex';

    export default {

        mounted() {
            let context = this;

            axios.get('/api/contacts')
                .then((response) => {
                    context.$store.dispatch('setContactsA', response.data);
                });
        },

        computed: {
            ...mapGetters(['sortedContacts']),
            ...mapState({
                current: state => state.contactList.current
            })
        },

        methods: {
            ...mapActions({
                setCurrent: 'setCurrentA',
            })
        },


    }
</script>

<style scoped>

</style>
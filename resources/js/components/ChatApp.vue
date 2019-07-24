<template>
    <div class="chat-app" id="">
    </div>
</template>

<script>
    export default {
        data(){
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            }
        },

        mounted() {
            axios.get('/api/contacts')
                .then((response) => {
                    console.log(response);
                    this.contacts = response.data;
                });
        }
    }
</script>

<style scoped>

</style>
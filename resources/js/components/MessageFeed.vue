<template>
    <div class="message-feed">
        <ul v-if="contact">
            <li v-for="message in messages" :key="message.id" :class="`message ${message.to == contact.id ? 'send' : 'recieved'}`">
                <div class="text">
                    {{ message.text }}
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
        }
    }
</script>

<style scoped>

</style>
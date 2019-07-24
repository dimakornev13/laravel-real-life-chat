<template>
    <div class="composer">
        <textarea v-model="message" @keyup.ctrl.enter="send"></textarea>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            }
        },

        methods: {
            send(){
                if(this.message == '')
                    return;

                this.$emit('send', this.message);

                this.message = '';
            }
        },
    }
</script>

<style scoped>

</style>
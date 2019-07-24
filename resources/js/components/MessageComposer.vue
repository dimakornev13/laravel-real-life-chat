<template>
    <div class="composer">
        <textarea v-model="message" @keyup.ctrl.enter="send" class=" form-control text-area" placeholder="Message..."></textarea>
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
    .text-area{
        width: 100%;
        min-height: 150px;
        resize: none;
    }
</style>
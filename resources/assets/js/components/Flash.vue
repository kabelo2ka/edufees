<!--Multiple errors https://github.com/andyleach/vue-flash/blob/master/src/Flash.vue-->

<template>
    <div class="notification is-primary alert-flash" v-show="show">
        <button class="delete" @click="hide()"></button>
        {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: this.message,
                show: false,
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on('flash', message => {
                this.flash(message);
            });
        },

        methods: {
            flash() {
                this.body = this.message;
                this.show = true;

                this.hideAfter(4);
            },
            hide() {
                this.show = false;
            },
            hideAfter(seconds) {
                setTimeout(()=>{
                    this.hide();
                }, seconds*1000);
            }
        },

    }
</script>

<style>
    .alert-flash {
        position: fixed;
        bottom: 10px;
        right: 10px;
    }
</style>
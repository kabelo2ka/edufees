<template>
    <div class="file has-name">
        <label class="file-label">
            <input class="file-input" type="file" :name="name" :accept="accept" @change="processFile($event)">
            <span class="file-cta">
                <span class="file-icon">
                    <i class="fa fa-upload"></i>
                </span>
                <span class="file-label">Click to upload</span>
            </span>
            <span v-if="filename" class="file-name"> {{ filename }} </span>
        </label>
    </div>
</template>

<script>
    export default {
        props: ['name', 'accept'],

        data() {
            return {
                filename: '',
            }
        },

        created() {

        },

        methods: {
            processFile(e) {
                if ( e.target.files[0] ) {
                    this.filename = e.target.files[0].name;
                }

            },
        },

    }
</script>
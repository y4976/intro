<template>
    <b-modal
            id="log-modal"
            scrollable
            size="xl"
            title="communication Log"
            hide-footer
            no-enforce-focus
    >
        <div>
            <b-form-textarea size="xs" rows="20" v-model="fullLog"></b-form-textarea>
        </div>
        <div>
            <b-button class="btn btn-sm btn-default float-right" @click="clearLog" autofocus>Clear</b-button>
        </div>
    </b-modal>
</template>

<script>
    import communicationLogger from '@/models/CommunicationLogger';

    export default {
        data() {
            return {
                communicationLogger: communicationLogger
            }
        },
        methods: {
            clearLog() {
                this.communicationLogger.clearLog();
            },
        },
        computed: {
            fullLog: function() {
                return this.communicationLogger.toString();
            }
        }
    }
</script>

<style scoped>
    textarea {
        width:100%;
    }
</style>
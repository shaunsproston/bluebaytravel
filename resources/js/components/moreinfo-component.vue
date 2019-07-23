<template>
    <div v-if="!this.appointments">
        LOADING!!!!!
    </div>
    <div v-else>
        <moreinfo-btns :appointment-id="appointmentId" :user="user"></moreinfo-btns>
        <moreinfo-btnshidden :appointment-id="appointmentId" :user="user" v-if="showBtn"></moreinfo-btnshidden>
        <moreinfo-details :appointment-id="appointmentId" :user="user" :appointments="appointments"></moreinfo-details>
    </div>
</template>
<script>
import { EventBus } from '../helpers/event-bus.js';

export default {
    props: {
        user: {
            default: null,
            type: Number
        },
        appointmentId: {
            default: null,
            type: Number
        }
    },
    data() {
        return {
            appointments: null,
            showBtn: false
        };
    },
    created() {
        EventBus.$on('Show Button State', showBtn => {
            this.showBtn = showBtn;
            console.log('test ' + this.showBtn);
        });
    },
    mounted () {
        this.getAppointments();
    },
    methods: {
        async getAppointments() {
            try {
                const response = await window.axios.get(`/api/users/${this.$props.user}/appointments/${this.$props.appointmentId}`);
                const appointments = response.data.data;

                this.$data.appointments = appointments;
            } catch (e) {
                console.log(e);
            }
        }
    }
}
</script>

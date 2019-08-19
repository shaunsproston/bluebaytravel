<template>
    <div>
        <table class="table">
            <tr class="h4">
                <th>Client Name</th>
                <th>Treatment</th>
                <th>Date of Booking</th>
                <th>Start Time</th>
                <th>Duration</th>
                <th>End Time</th>
                <th class="more-info"></th>
            </tr>
            <appointment v-for="(appointment, index) in $data.appointments" :key="index" :appointment="appointment"></appointment>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        user: {
            default: null,
            type: Number
        }
    },
    data() {
        return {
            appointments: []
        };
    },
    mounted () {
        this.getAppointments();
    },
    methods: {
        async getAppointments() {
            try {
                const response = await window.axios.get(`/api/users/${this.$props.user}/appointments`);
                const appointments = response.data.data;

                this.$data.appointments = appointments;
            } catch (e) {
                console.log(e);
            }
        }
    }
}
</script>


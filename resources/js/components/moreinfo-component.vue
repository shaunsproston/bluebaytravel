<template>
    <div>
        <moreinfo-btns></moreinfo-btns>
        <moreinfo-details></moreinfo-details>
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

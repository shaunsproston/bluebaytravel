<template>
    <div>
        <h1>First Vue Component</h1>
        <table class="table">
            <tr>
                <th>Client Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Appointment Start Time</th>
            </tr>
            <tr v-for="(item, index) in $data.appointments" :key="index">
                <td> {{ item.name }} </td>
                <td> {{ item.email }} </td>
                <td> {{ item.address }} </td>
                <td> {{ item.treatment_start_time }} </td>
            </tr>
        </table>
    </div>   
</template>

<script>
export default {
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
                const response = await window.axios.get('/api/data');
                const appointments = response.data.data;

                this.$data.appointments = appointments;
            } catch (e) {
                console.log(e);
            }

        }
    }
}

</script>


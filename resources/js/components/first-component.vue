<template>
    <div>
        <table class="table">
            <tr class="h3">
                <th>Client Name</th>
                <th>Appointment Start Time</th>
                <th>Duration</th>
                <th class="more-info"></th>
            </tr>
            <tr v-for="(item, index) in $data.appointments" :key="index">
                <td> {{ item.name }} </td>
                <td> {{ item.treatment_start_time }} </td>
                <td> {{ item.duration }} </td>
                <td class="more-info"><a :href="'/appointments/moreinfo/' + item.id"><button type="button" class="btn btn-info">more info</button></a></td>
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


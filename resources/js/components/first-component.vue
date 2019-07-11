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
            <tr v-for="(item, index) in $data.appointments" :key="index">
                <td> {{ item.first_name +' '+ item.last_name }} </td>
                <td> {{ item.type }} </td>
                <td> {{ item.date }} </td>
                <td> {{ item.treatment_start_time }} </td>
                <td> {{ item.duration }} minutes</td>
                <td> {{ item.treatment_end_time }} </td>
                <td class="more-info"><a :href="'/bookings/' + item.id"><button type="button" class="btn btn-info">more info</button></a></td>
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


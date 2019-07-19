<template>
    <tr>
        <td>{{ appointment.first_name + " " + appointment.last_name }}</td>
        <td>{{ appointment.type }}</td>
        <td>{{ appointment.date }}</td>
        <td>{{ appointment.treatment_start_time }}</td>
        <td>{{ appointment.duration }} minutes</td>
        <td>{{ appointment.treatment_end_time }}</td>
        <td class="more-info"><a :href="appointment.id"><button type="button" class="btn btn-info">more info</button></a></td>
    </tr>
</template>

<script>
export default {
    props: {
        appointment: {
            default: null,
            type: Object
        }
    }
}
</script>


<template>
    <div>
        <h1>First Vue Component</h1>
        <table class="table">
            <tr>
                <th>Client Name</th>
                <th>Type</th>
                <th>Duration</th>
                <th>Appointment Start Time</th>
            </tr>
            <tr>
                <td> {{ name }} </td>
                <td> {{ type }} </td>
                <td> {{ duration }} </td>
                <td> {{ start_time }} </td>
            </tr>
        </table>
        <p>Test</p>
    </div>   
</template>

<script>

export default {
    data() {
        return {
            name: [
                { firstName: 'Bob'},
                { firstName: 'Steve'},
                { firstName: 'Dave'}
            ],
            type: [
                { firstName: 'A'},
                { firstName: 'B'},
                { firstName: 'C'}
            ],
            duration: [
                { firstName: '1'},
                { firstName: '2'},
                { firstName: '3'}
            ],
            start_time: [
                { firstName: 'X'},
                { firstName: 'Y'},
                { firstName: 'Z'}
            ]
        }
    }
}

/*
export default {
    data() {
        return {
            name: 'Bob',
            type: 'Foot Massage',
            duration: '30 mins',
            start_time: '7.30'
        }
    }
}
*/

</script>


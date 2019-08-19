<template>
    <div>
        <div>
            <h2>Customer Name - <span id="name">{{ appointments.first_name + " " + appointments.last_name }}</span></h2>
            <h4>Customer ID - <span id="type">{{ appointments.client_id }}</span></h4>
            <h4>Booked in for <span id="type">{{ appointments.type }}</span> on <span id="type">{{ appointments.date }}</span></h4>
        </div>
        <br>
        <hr>
        <div class="card bg-info text-white" style="width:500px">
            <div class="card-body">
                <h5>Appointment Details</h5>
                <ul class="list-unstyled">
                    <li>Type of Treatment - <span>{{ appointments.type }}</span></li>
                    <li>Duration - <span>{{ appointments.duration }} minutes</span></li>
                    <li>Treatment Starts - <span>{{ appointments.treatment_start_time }}</span></li>
                    <li>Treatment Finishes - <span>{{ appointments.treatment_end_time }}</span></li>
                    <li>Price - <span>£{{ appointments.price }}</span></li>
                </ul>
            </div>
        </div>
        <br>
        <div class="card bg-info text-white" style="width:500px">
            <div class="card-body">
                <h5>Contact Details</h5>
                <ul class="list-unstyled">
                    <li>Email - <span>{{ appointments.email }}</span></li>
                    <li>Contact Number - <span>{{ appointments.tel }}</span></li>
                    <li>Address - </li>
                    <ul class="list-unstyled ml-5">
                        <li><span>{{ appointments.address.house_number + ' ' + appointments.address.street }},</span></li>
                        <li><span>{{ appointments.address.town }},</span></li>
                        <li><span>{{ appointments.address.county }},</span></li>
                        <li><span>{{ appointments.address.postcode }}</span></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>    
    export default {
        props: {
            user: {
                default: null,
                type: Number
            },
            appointmentId: {
                default: null,
                type: Number
            },
            appointments: {
                default: null,
                type: Object
            }
        }
    }
</script>





<template>
    <div>
       <div class="container alert alert-danger">
            <h3>Are you sure you want to remove this booking?</h3>
            <div>
                <button type="submit" class="btn btn-success" @click.prevent="deleteAppointment()">Confirm</button>
                <button type="button" class="btn btn-danger" @click.prevent="showBtnFunc()">Cancel</button>
            </div>
        </div> 
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
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {
        showBtnFunc() {
            EventBus.$emit('Show Button State');
        },
        async deleteAppointment() {
            try {
                const response = await window.axios.delete(`/api/users/${this.$props.user}/appointments/${this.$props.appointmentId}`);
                    if (response.status == 200){
                        window.location.href = "/bookings";
                    } else {
                        console.log(e);
                    }
            } catch (e) {
                console.log(e);
            }
        }

    }
}
</script>

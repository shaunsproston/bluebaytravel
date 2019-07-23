<template>
    <div>
        <div class="container">
            <br>
            <a href="./"><button type="button" class="btn btn-info">Back</button></a>
            <a :href="`/bookings/${appointmentId}/edit`"><button type="button" class="btn btn-info">Edit Appointment</button></a>
            <button type="button" id="removeBtn" class="btn btn-danger float-right" @click="showBtnFunc()">Remove Appointment</button>
        </div>
        <hr>
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
            showBtn: false
        }
    },
    methods: {
        showBtnFunc() {
            if (this.showBtn == true){
                this.showBtn = false;
            } else {
                this.showBtn = true;
            }
            EventBus.$emit('Show Button State', this.showBtn);
        }
    }
}
</script>

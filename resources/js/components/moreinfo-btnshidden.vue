<template>
    <div>
       <div class="container alert alert-danger">
            <h3>Are you sure you want to remove this booking?</h3>
            <div>
                <form :action="`/bookings/${appointmentId}`" method="POST">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-success">Confirm</button>
                    <button type="button" class="btn btn-danger" @click="showBtnFunc()">Cancel</button>
                </form>
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
        }
    }
}
</script>

<template>
    <div v-if="!loaded">
        LOADING!!!!!
    </div>
    <div v-else>
        <div class="container h5 p-5">
            <h1>{{ title }}</h1>
        </div>
        <hr>
        <div class="container">
            <a :href="homePath"><button type="button" class="btn btn-info">Back</button></a>
        </div>
        <hr>
        <div class="container">
            <form class="form-horizontal" :action="homePath" method="POST">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="_method" :value="sendMethodType">
                <h3>Treatment details</h3>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="treatmentType">Select treatment:</label>
                    <select class="form-control" name="treatmentType">
                        <option v-for="(item, index) in $data.treatments" :key="index" :value="item.id">{{ item.type }}</option>
                    </select>
                </div>
                <div class="form-inline m-3">
                    <br>
                    <label class="control-label col-sm-3"  for="treatmentDate">Select treatment date:</label>
                    <input class="form-control" type="date" name="treatmentDate" :min="date" :max="datePlus3Months">
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="treatmentTime">Select time slot:</label>
                    <select class="form-control" name="treatmentTime">
                        <option v-for="(item, index) in $data.workingHours" :key="index" :value="item">{{ item }}</option>
                    </select>
                </div>
                <hr>
                <h3>Personal details</h3>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="first_name">First Name:</label>
                    <input type="text" class="form-control" name="first_name" :value="`${$data.appointment.first_name}`" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" :value="`${$data.appointment.last_name}`" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <input type="email" class="form-control" name="email" :value="`${$data.appointment.email}`" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="tel">Telephone Number:</label>
                    <input type="tel" class="form-control" name="tel" :value="`${$data.appointment.tel}`" required>
                </div>
                <hr>
                <h3>Address</h3>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="house_number">House Name / Number:</label>
                    <input type="text" class="form-control" name="house_number" :value="`${$data.appointment.address.house_number}`" required>
                </div>
                <div class="form-inline m-3">
                        <label class="control-label col-sm-3" for="street">Street Name:</label>
                        <input type="text" class="form-control" name="street" :value="`${$data.appointment.address.street}`" required>
                    </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="town">Town / City:</label>
                    <input type="text" class="form-control" name="town" :value="`${$data.appointment.address.town}`" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="county">County / State:</label>
                    <input type="text" class="form-control" name="county" :value="`${$data.appointment.address.county}`" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="postcode">Postcode / Zipcode:</label>
                    <input type="text" class="form-control" name="postcode" :value="`${$data.appointment.address.postcode}`" required>
                </div>
                <hr>
                <div class="form-inline m-3">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Confirm Booking</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { loadavg } from 'os';
import { dateFunction } from '../helpers/dateFormatter';

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
                date: new Date().toISOString().substring(0,10),
                datePlus3Months: dateFunction(),
                treatments: [],
                workingHours: [],
                appointment: {
                    first_name: "",
                    last_name: "",
                    email: "",
                    tel: "",
                    address: {
                        house_number: "",
                        street: "",
                        town: "",
                        county: "",
                        postcode: ""
                    }
                },
                loaded: false
            };
        },
        mounted () {
            this.getFormData(); 
            if(this.$props.appointmentId){
                this.getAppointments();
            }
            this.$nextTick(() => {
                this.$data.loaded = true;
            });
        },
        computed: {
            title() {
                if(this.$props.appointmentId){
                    return "Edit your Treatment";
                }

                return "Book your Treatment";
            },
            homePath() {
                if(this.$props.appointmentId){
                    return `/bookings/${this.$props.appointmentId}`;
                }

                return "/bookings";
            },
            sendMethodType() {
                if(this.$props.appointmentId){
                    return "PUT";
                }

                return "POST";
            }
        },
        methods: {
            async getFormData() {
                try {
                    const response = await window.axios.get(`/api/formdata`);
                    const { treatments, workingHours } = response.data.data;
                    this.$data.treatments = treatments;
                    this.$data.workingHours = workingHours;
                } catch (e) {
                    console.log(e);
                }
            },
            async getAppointments() {
                try {
                    const response = await window.axios.get(`/api/users/${this.$props.user}/appointments/${this.$props.appointmentId}`);
                    const appointment = response.data.data;
                    this.$data.appointment = appointment;
                } catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>


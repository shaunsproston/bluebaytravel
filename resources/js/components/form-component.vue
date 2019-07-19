<template>
    <div id="test">
        <div class="container h5 p-5">
            <h1>{{ title }}</h1>
        </div>
        <hr>
        <div class="container">
            <a href="../bookings"><button type="button" class="btn btn-info">Back</button></a>
        </div>
        <hr>
        <div class="container">
            <form class="form-horizontal" action="/bookings" method="POST">
                <input type="hidden" name="_token" :value="csrf">
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
                    <input class="form-control" type="date" name="treatmentDate" v-bind:min="date" v-bind:max="datePlus3Months">
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
                    <input type="text" class="form-control" name="first_name" value="" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="last_name">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="tel">Telephone Number:</label>
                    <input type="tel" class="form-control" name="tel" value="" required>
                </div>
                <hr>
                <h3>Address</h3>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="house_number">House Name / Number:</label>
                    <input type="text" class="form-control" name="house_number" value="" required>
                </div>
                <div class="form-inline m-3">
                        <label class="control-label col-sm-3" for="street">Street Name:</label>
                        <input type="text" class="form-control" name="street" value="" required>
                    </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="town">Town / City:</label>
                    <input type="text" class="form-control" name="town" value="" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="county">County / State:</label>
                    <input type="text" class="form-control" name="county" value="" required>
                </div>
                <div class="form-inline m-3">
                    <label class="control-label col-sm-3" for="postcode">Postcode / Zipcode:</label>
                    <input type="text" class="form-control" name="postcode" value="" required>
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
    const moment = require('moment');

    export default {
        props: {
            user: {
                default: null,
                type: Number
            }
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                title: 'Book your Treatment',
                date: moment().utc().format("YYYY-MM-DD"),
                datePlus3Months: moment().add(90, 'days').format("YYYY-MM-DD"),
                treatments: [],
                workingHours: []
            };
        },
        mounted () {
            this.getFormData();
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
            }
        }
    }
</script>


@extends('layouts/app')

@section('content')

    <div class="container h5 p-5">
        <h2>Customer Name -<span id="name">{{ $data->client->name }}</span></h2>
        <h4>Customer ID -<span id="type">{{ $data->client->id }}</span></h4>
    </div>
    <div class="container">
            <a href="../"><button type="button" class="btn btn-info">Back</button></a>
        </div>
    <hr>
    <div>
        <h4>Booked in for -<span id="type">{{ $data->treatment->type }}</span></h4>
        <h6>Treatment Starts - <span id="treatment_start_time">{{ $data->treatment_start_time }}</span></h6>
        <h6>Treatment Duration - <span id="duration">{{ $data->treatment->duration }} minutes.</span></h6>
    </div>
        
    <br>
    <hr>

    <div class="card bg-info text-white" style="width:400px">
        <div class="card-body">
            <h5>Appointment Details</h5>
            <ul class="list-unstyled">
                <li>Treatment - <span>{{ $data->treatment->type }}</span></li>
                <li>Duration - <span>{{ $data->treatment->duration }} minutes</span></li>
                <li>Treatment Starts - <span>{{ $data->treatment_start_time }}</span></li>
                <li>Treatment Finishes - <span></span></li>
                <li>Price - <span>£{{ $data->treatment->price }}</span></li>
            </ul>
        </div>
    </div>
    <br>
    <div class="card bg-info text-white" style="width:400px">
            <div class="card-body">
                <h5>Contact Details</h5>
                <ul class="list-unstyled">
                    <li>Email - <span>{{ $data->client->email }}</span></li>
                    <li>Address - <span>{{ $data->client->address }}</span></li>
                    <li>Contact Number - <span>{{ $data->client->tel }}</span></li>
                </ul>
            </div>
        </div>
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
@endsection
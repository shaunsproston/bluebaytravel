<template>
    <div>
        <div class="container">
            <br>
            <a href="./"><button type="button" class="btn btn-info">Back</button></a>
            <a href="/bookings/#/edit"><button type="button" class="btn btn-info">Edit Appointment</button></a>
            <button type="button" id="removeBtn" class="btn btn-danger float-right" onclick="javascript:showDiv();">Remove Appointment</button>
        </div>
        <hr>
        <moreinfo-btnshidden></moreinfo-btnshidden>
    </div>
</template>
<script>
    showDiv = ()=> {
        document.querySelector("#warningMsg").style.display = "inline-block";
    };

    hideDiv = ()=> {
        document.querySelector("#warningMsg").style.display = "none";
    };
</script>

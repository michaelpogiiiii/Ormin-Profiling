<div class="top mt-2">
    <button class="btn btn-success text-light" onclick="addEvent()" id="addeventbtn">
        <i class="fa fa-calendar" style="margin-right: 5px;"></i> +Add Event
    </button>
</div>
<div class="event-modal" id="event-modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()" id="closebtn">&times;</span>
        <h3 class="text-center text-uppercase text-info" style="font-size:30px;">Add New Event</h3>
        <form action="{{url('save-bulalacao-event')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Event Name</label>
            <input id="name" type="text" name="name" required>

            <input id="municipality" type="text" name="municipality" hidden value="Bulalacao">

            <label for="about">About Event</label>
            <textarea name="about" id="about" cols="35" rows="8" required placeholder="Input the event's purpose..."></textarea>

            <label for="photo">Event's Photo</label>
            <input type="file" name="photo" id="photo">

            <label for="location">Event's Venue</label>
            <input type="text" name="location" id="location" required>
            
            <label for="date">Date</label>
            <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>"> <br>


            

            <button class="btn btn-success text-dark mt-2" type="submit" style="background-color:green; ">Add Avent</button>
        </form>
    </div>
</div>


<script>
    // get Modal
    const userModal = document.getElementById('event-modal');

    // get btn that opens Reg Form Modal
    const btn = document.getElementById('addeventbtn');

    // get the btn that closes Modal
    const span = document.getElementById('closebtn');

    // Function that Opens Modal
    function addEvent(){
        userModal.style.display = 'block';
    }

    // Function that closes Modal
    function closeModal(){
        userModal.style.display = 'none';
    }

    // Close the reg form modal when the user clicks the span element
    span.onclick = closeModal;

    // Close the modal when the user clicks anywhere outside of it
    window.onclick = function(event) {
        if (event.target == userModal) {
            closeModal();
        }
    };
</script>
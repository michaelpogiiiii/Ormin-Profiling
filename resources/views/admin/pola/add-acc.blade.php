<div class="top mt-2">
    <button class="btn btn-success text-light" onclick="addEvent()" id="addeventbtn">
        <i class="fa fa-file" style="margin-right: 5px;"></i> +Add Report
    </button>
</div>
<div class="event-modal" id="event-modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()" id="closebtn">&times;</span>
        <h3 class="text-center text-uppercase text-info" style="font-size:30px;">Add New Report</h3>
        <form action="{{ url('add-pola-acc') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Report Name</label>
            <input id="name" type="text" name="name" required>

            <input id="municipality" type="text" name="municipality" hidden value="Pola">

            <label for="file">About Event</label>
            <input type="file" name="file" required>




            <button class="btn btn-success text-dark mt-2" type="submit" style="background-color:green; ">Add
                Report</button>
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
    function addEvent() {
        userModal.style.display = 'block';
    }

    // Function that closes Modal
    function closeModal() {
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

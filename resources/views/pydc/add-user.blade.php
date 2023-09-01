<div class="top mt-2">
    <button class="btn btn-success" onclick="addUser()" id="adduserbtn"><i class="fa fa-user-plus"></i> Add User</button>
</div>
<div class="user-modal" id="user-modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()" id="closebtn">&times;</span>
        <h3>Add New User</h3>
        <form action="{{ url('user-profile') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" required> <br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email"> <br>

            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" name="password" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                    title="Password must contain at least one uppercase letter, one lowercase letter, and one number, and be at least 8 characters long">
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <i id="password-icon" class="fa fa-eye" style="font-size: 25px;"></i>
                </span>
            </div>

            <label for="municipality">Municipality</label>
            <input type="text" id="municipality" name="municipality" required value="Municipality Admin" hidden>

            <select id="usertype" name="usertype" required autofocus autocomplete="usertype">
                <option>User Type</option>
                <option value="1">Super Admin</option> 
                <option value="2">Baco Admin</option>
                <option value="3">Bansud Admin</option>
                <option value="4">Bongabong Admin</option>
                <option value="5">Bulalacao Admin</option>
                <option value="6">Calapan City Admin</option>
                <option value="7">Gloria Admin</option>
                <option value="8">Mansalay Admin</option>
                <option value="9">Naujan Admin</option>
                <option value="10">Pinamalayan Admin</option>
                <option value="11">Pola Admin</option>
                <option value="12">Puerto Galera Admin</option>
                <option value="13">Roxas Admin</option>
                <option value="14">San Teodoro Admin</option>
                <option value="15">Socorro Admin</option>
                <option value="16">Victoria Admin</option>
                <!-- Add more options for each municipality -->
            </select>

            <button class="btn btn-primary text-dark mt-2" type="submit">Register</button>
        </form>
    </div>
</div>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var passwordIcon = document.getElementById("password-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-minus-circle");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-minus-circle");
            passwordIcon.classList.add("fa-eye");
        }
    }
</script>

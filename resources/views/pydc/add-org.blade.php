<!DOCTYPE html>

<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="user/images/goyddbgfinalogo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Tinker admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Tinker Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title> Add Organization List </title>
    <!-- BEGIN: CSS Assets-->
    <!-- CSS -->
    <!-- CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/js/font-awesome.min.js"></script>

    <link rel="stylesheet" href="admin/dist/css/app.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    
.form-wrapper {
    text-align: center;
    background-color: #ffffff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    width: 80%;
    max-width: 800px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

 h2 {
    margin-bottom: 20px;
    padding: 15px;
    text-align: center;
    font-size: 40%;

}
h3 {
    margin-bottom: 20px;
    padding: 15px;
    text-align: center;

}

.form-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.form-group {
    flex: 1 1 calc(50% - 20px); /* 50% width minus the gap */
    display: flex;
    flex-direction: column;
}

.form-group label {
    margin-bottom: 5px;
}

.form-group input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group2  {
    margin-top: -5px;
    width: 260px;
    margin-left: -5px;
}
.form-group2 input  {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 260px;
}
.form-group3  {
    width: 260px;
    margin-top: -5px;
    margin-left: -10px;
}
.form-group3 input  {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 260px;
    
}
.form-group4  {
    width: 270px;
    margin-top: -5px;
    margin-left: -10px;
}
.form-group4 input  {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 270px;
    
}
.form-group5  {
    width: 815px;
    margin-top: -5px;
    margin-left: -5px;
}
.form-group5 input  {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 815px;
    
}

    .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .step-buttons {
            margin-top: 20px;
           
        }
        .step-buttons button {
            padding: 10px 20px;
            margin: 5px;
            margin-left: 350px;
        }
        .step-buttons1 {
            margin-top: 20px;
        }
        .step-buttons1 button {
            padding: 10px 20px;
            margin: 5px;
            margin-left: -60px;
        }
        .step-buttons2 {
            margin-top: 20px;
        }
        .step-buttons2 button {
            padding: 10px 20px;
            margin: 5px;
            margin-left: 20px;
        }

    .container {
        display: flex;
        justify-content: center;
    }

    .form-group1 label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        margin-left: -479px;
    }

    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    
    .form-group1 textarea {
        width: 921px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical; /* Allow vertical resizing */
        min-height: 50px; /* Specify a minimum height */
        margin-left: -479px;
    }


    .form-group .checkbox {
        margin-top: 5px;
    }

    .form-group .checkbox label {
        font-weight: normal;
    }

    .jsubmit-btn {
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: green;
        margin-left: -50px;
        margin-top: 20px;
        margin-bottom: -100px;
    }

    .container .jsubmit-btn {
        background-color: green;
    }

    .jsubmit-btn:hover {
        background-color: red;
    }
    .btn {
            background-color: green;
            border: none;
            border-radius: 10px;
            color: white;
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
            padding: 10px;}
    .btn1 {
            background-color: green;
            border: none;
            border-radius: 10px;
            color: white;
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
            padding: 10px;
            margin-left: 400px;
        }
    .btn1:hover {
        background-color: red;
        }

        .search-container {
    position: relative;
}
/* Hide the close button inside the text box */
.search-input::-webkit-search-cancel-button {
    -webkit-appearance: none;
}

.search-input {
    padding-right: 60px; /* Adjust as needed */
}

.search-button {
    position: absolute;
    top: 50%;
    right: 15px; /* Adjust as needed */
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
}

.btn{
            background-color: #efefef;
            border: none;
            border-radius: 25px;
            color: #424242;
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
        }
        .btn1 {
            margin-left: 500px;
            background-color: #efefef;
            border: none;
            border-radius: 25px;
            color: #424242;
            box-shadow: -6px -6px 10px #f9f9f9,
                         6px 6px 10px #00000026;
            font-size: 16px;
        }
</style>

<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">

    @include('pydc.mobile')

    <div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
        @include('pydc.sidebar')

        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Super Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Approved Oranization List </li>
                        <li class="breadcrumb-item active" aria-current="page"> Add Organization List </li>

                    </ol>
                </nav>
                <x-app-layout></x-app-layout>
                <!-- END: Breadcrumb -->
            </div>
            <!-- END: Top Bar -->
            <div class="body-top mt-2" style="display: flex; justify-content:space-between;">
            <form action="{{ url('add-organization') }}" type="POST" class="search-form">
    <div class="search-container">
        <input type="search" name="users" placeholder="Search Profile" autocomplete="off" class="rounded search-input" style="color:rgb(80, 91, 91);">
        <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
    </div>
</form>

              
                <button onclick="printTable()" class="btn btn-success"> <i class="fa fa-print text-dark"
                        style="font-size: 40px"></i> </button>
            </div>   <br>   <br>   <br>

          
            {{-- Message --}}
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
            <form action="{{ url('addorg1') }}" method="POST">
                @csrf



                <div class="container" style="background-color: white; border: 1px solid #ccc; padding: 15px; border-radius: 10px; margin-top: -30px; width: 850px;">
        <form id="registrationForm">
            <!-- Step 1 -->
         
            <div class="step active" id="step1">
             <h2 style="font-size:20px; font-weight:bold;">Step 1: ORGANIZATION PROFILE </h2>
                <div class="form-container">
        <div class="form-group">
            <label for="head_name">URN:</label>
            <input type="text" id="head_name" name="head_name" required>
  
        </div>
        <div class="form-group">
            <label for="organization_name">Name of Organization:</label>
            <input type="text" id="organization_name" name="organization_name" required>
        </div>
        <div class="form-group5">
            <label for="complete_address">Complete Address:</label>
            <input type="text" id="complete_address" name="complete_address" required>
        </div>
        <div class="form-group2">
            <label for="telephone_number">Telephone Number:</label>
            <input type="number" id="telephone_number" name="telephone_number">
        </div>
        <div class="form-group3">
            <label for="cellphone_number">Cellphone Number:</label>
            <input type="number" id="cellphone_number" name="cellphone_number" >
        </div>
        <div class="form-group4">
            <label for="number_members">Number of Members:</label>
            <input type="number" id="number_members" name="number_members" required>
        </div>
        <div class="form-group">
            <label for="date_establish">Date Establish:</label>
            <input type="date" id="date_establish" name="date_establish" required>
        </div>
        <div class="form-group">
            <label for="date_establish">Date Approved:</label>
            <input type="date" id="date_establish" name="date_establish" required>
        </div>
        <div class="form-group">
            <label for="major_classification">Major Classification:</label>
                    <select id="major_classification" name="major_classification" required onchange="updateMajor()">
                        <option value="">Select</option>
                        <option value="Youth Organization">Youth Organization</option>
                        <option value="Youth-Serving Organization">Youth-Serving Organization</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="sub_classification">Sub-Classification:</label>
            <select id="sub_classification" name="sub_classification" required onchange="updateSub()">
                        <option value="">Select</option>
                        <option value="Community-based">Community-based</option>
                        <option value="School-based">School-based</option>
                        <option value="Faith-based">Faith-based</option>
                        <option value="Consortium/Federation">Consortium/Federation</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="pydp_center">PYDP Center:</label>
            <select id="pydp_center" name="pydp_center" required onchange="updatePYDP()">
                        <option value="">Select</option>
                        <option value="Education">Education</option>
                        <option value="Environment">Environment</option>
                        <option value="Health">Health</option>
                        <option value="Peace Building & Security">Peace Building & Security</option>
                        <option value="Governance">Governance</option>
                        <option value="Active Citizenship">Active Citizenship</option>
                        <option value="Global Mobility">Global Mobility</option>
                        <option value="Social Inclusion & Equity">Social Inclusion & Equity</option>
                        <option value="Economic Empowerment">Economic Empowerment</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="email_add">Official Organization Email Address:</label>
            <input type="text" id="email_add" name="email_add" required>
        </div>
        <div class="form-group">
            <label for="brief_description">Brief Description:</label>
            <textarea id="description" name="description" required=""></textarea>
        </div>
    </div>
    
                <div class="step-buttons">
                    <button type="button" onclick="nextStep()">Next</button>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="step" id="step2">
                <h2 style="font-size:20px; font-weight:bold;">Step 2: LEADERSHIP & MEMBERSHIP INFORMATION</h2>
                <div class="form-container">
        <div class="form-group">
            <label for="head_name">Name of Head of Organization:</label>
            <input type="text" id="head_name" name="head_name" required>
        </div>
        <div class="form-group">
            <label for="adviser_name">Name of Adviser:</label>
            <input type="text" id="adviser_name" name="adviser_name" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number/Mobile Number:</label>
            <input type="number" id="contact_number" name="contact_number" required>
        </div>
      
   
        <div class="form-group">
            <label for="email_address">Email Address:</label>
            <input type="text" id="email_address" name="email_address" required>
        </div>
        
                <div class="step-buttons1">
                    <button type="button" onclick="prevStep()">Previous</button>
        </div>
                <div class="step-buttons2">  
                    <button type="button" onclick="nextStep()">Next</button>
                </div>
                </div>
        </div>

            <!-- Step 3 -->
            <div class="step" id="step3">
                <h3 style="font-size:20px; font-weight:bold;">Step 3: ATTACHMENTS/REQUIREMENTS</h3>
                <div class="form-container">
                <div class="form-group">
                <label for="file">Registration Form:</label>
                <input type="file" name="registration_file" required>
                 </div>
                 <div class="form-group">
                <label for="file">List of members in Good Standing:</label>
                <input type="file" name="list_of_members_file" required>
                 </div>
                 <div class="form-group">
                <label for="file">Directory of Officers & Advisers:</label>
                <input type="file" name="directory_file" required>
                 </div>
                 <div class="form-group">
                <label for="file">Copy of Constitution and By-Laws:</label>
                <input type="file" name="constitution_file" required>
                 </div>
            
                 <div class="step-buttons1">
                    <button type="button" onclick="prevStep()">Previous</button>
        </div>
                <div class="step-buttons2">  
                    <button type="submit">Submit</button>
                </div>
                </div>
                </div>
                </form>
    </div>

    </form>
 
    <script src="admin/dist/js/app.js"></script>
    <script>
        let currentStep = 1;

        function nextStep() {
            if (currentStep < 4) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep++;
                document.getElementById(`step${currentStep}`).classList.add('active');
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.add('active');
            }
        }

        function updateBarangays() {
            const municipality = document.getElementById("municipality").value;
            const barangayDropdown = document.getElementById("state");

            // Clear previous options
            barangayDropdown.innerHTML = "";

            // Populate barangays based on the selected municipality
            switch (municipality) {
                case "Puerto Galera":
                    populateBarangays(["Select barangay", "Aninuan", "Baclayan", "Balatero", "Dulangan", "Palangan", "Sabang", "San Antonio", "San Isidro", "Santo Niño", "Sinandigan", "Tabinay", "Villaflor"]);
                    break;
                case "San Teodoro":
                    populateBarangays(["Select barangay", "Bigaan", "Caagutayan", "Calangatan", "Calsapa", "Ilag", "Lumangbayan", "Poblacion", "Tacligan"]);
                    break;
                case "Baco":
                    populateBarangays(["Select Barangay", "Alag", "Bangkatan", "Baras", "Bayanan", "Burbuli", "Catwiran I", "Catwiran II", "Dulangan I", "Dulangan II", "Lantuyang", "Lumang Bayan", "Malapad", "Mangangan I", "Mangangan II", "Mayabig", "Pambisan", "Poblacion", "Pulang-Tubig", "Putican-Cabulo", "San Andres", "San Ignacio", "Santa Cruz", "Santa Rosa I", "Santa Rosa II", "Tabon-tabon", "Tagumpay", "Water"]);
                    break;
                case "Calapan":
                    populateBarangays(["Select Barangay", "Balingayan", "Balite", "Baruyan", "Batino", "Bayanan I", "Bayanan II", "Biga", "Bondoc", "Bucayao", "Buhuan", "Bulusan", "Calero", "Camansihan", "Camilmil", "Canubing I", "Canubing II", "Comunal", "Guinobatan", "Gulod", "Gutad", "Ibaba East", "Ibaba West", "Ilaya", "Lalud", "Lazareto", "Libis", "Lumang Bayan", "Mahal na Pangalan", "Maidlang", "Malad", "Malamig", "Managpi", "Masipit", "Nag-iba I", "Nag-iba II", "Navotas", "Pachoca", "Palhi", "Panggalaan", "Parang", "Patas", "Personas", "Putingtubig", "Salong", "San Antonio", "San Vicente Central", "San Vicente East", "San Vicente North", "San Vicente South", "San Vicente West", "Santa Cruz", "Santa Isabel", "Santa Maria Village", "Santa Rita", "Santo Niño", "Sapul", "Silonay", "Suqui", "Tawagan", "Tawiran", "Tibag", "Wawa"]);
                    break;
                case "Naujan":
                    populateBarangays(["Select Barangay", "Adrialuna", "Andres Ilagan", "Antipolo", "Apitong", "Arangin", "Aurora", "Bacungan", "Bagong Buhay", "Balite", "Bancuro", "Banuton", "Barcenaga", "Bayani", "Buhangin", "Caburo", "Concepcion", "Dao", "Del Pilar", "Estrella", "Evangelista", "Gamao", "General Esco", "Herrera", "Inarawan", "Kalinisan", "Laguna", "Mabini", "Magtibay", "Mahabang Parang", "Malaya", "Malinao", "Malvar", "Masagana", "Masaguing", "Melgar A", "Melgar B", "Metolza", "Montelago", "Montemayor", "Motoderazo", "Mulawin", "Nag-iba I", "Nag-iba II", "Pagkakaisa", "Paitan", "Paniquian", "Pinagsabangan I", "Pinagsabangan II", "Piñahan", "Poblacion I", "Poblacion II", "Poblacion III", "Sampaguita", "San Agustin I", "San Agustin II", "San Andres", "San Antonio", "San Carlos", "San Isidro", "San Jose", "San Luis", "San Nicolas", "San Pedro", "Santa Cruz", "Santa Isabel", "Santa Maria", "Santiago", "Santo Niño", "Tagumpay", "Tigkan"]);
                    break;
                case "Victoria":
                    populateBarangays(["Select Barangay", "Alcate", "Antonino", "Babangonan", "Bagong Buhay", "Bagong Silang", "Bambanin", "Bethel", "Canaan", "Concepcion", "Duongan", "Jose Leido Jr.", "Loyal", "Mabini", "Macatoc", "Malabo", "Merit", "Ordovilla", "Pakyas", "Poblacion I", "Poblacion II", "Poblacion III", "Poblacion IV", "Sampaguita", "San Antonio", "San Cristobal", "San Gabriel", "San Gelacio", "San Isidro", "San Juan", "San Narciso", "Urdaneta", "Villa Cerveza"]);
                    break;
                case "Socorro":
                    populateBarangays(["Select Barangay", "Bagsok", "Batong Dalig", "Bayuin", "Bugtong na Tuog", "Calocmoy", "Calubayan", "Catiningan", "Fortuna", "Happy Valley", "Leuteboro I", "Leuteboro II", "Ma. Concepcion", "Mabuhay I", "Mabuhay II", "Malugay", "Matungao", "Monteverde", "Pasi I", "Pasi II", "Santo Domingo", "Subaan", "Villareal", "Zone I", "Zone II", "Zone III", "Zone IV"]);
                    break;
                case "Pola":
                    populateBarangays(["Select Barangay", "Bacawan", "Bacungan", "Batuhan", "Bayanan", "Biga", "Buhay na Tubig", "Calima", "Calubasanhon", "Campamento", "Casiligan", "Malibago", "Maluanluan", "Matulatula", "Misong", "Pahilahan", "Panikihan", "Pula", "Puting Cacao", "Tagbakin", "Tagumpay", "Tiguihan", "Zone I", "Zone II"]);
                    break;
                case "Pinamalayan":
                    populateBarangays(["Select Barangay", "Anoling", "Bacungan", "Bangbang", "Banilad", "Buli", "Cacawan", "Calingag", "Del Razon", "Guinhawa", "Inclanay", "Lumangbayan", "Malaya", "Maliangcog", "Maningcol", "Marayos", "Marfrancisco", "Nabuslot", "Pagalagala", "Palayan", "Pambisan Malaki", "Pambisan Munti", "Panggulayan", "Papandayan", "Pili", "Quinabigan", "Ranzo", "Rosario", "Sabang", "Santa Isabel", "Santa Maria", "Santa Rita", "Santo Niño", "Wawa", "Zone I", "Zone II", "Zone III", "Zone IV"]);
                    break;
                case "Gloria":
                    populateBarangays(["Select Barangay", "Agos", "Agsalin", "Alma Villa", "Andres Bonifacio", "Balete", "Banus", "Banutan", "Bulaklakan", "Buong Lupa", "Gaudencio Antonino", "Guimbonan", "Kawit", "Lucio Laurel", "Macario Adriatico", "Malamig", "Malayong", "Maligaya", "Malubay", "Manguyang", "Maragooc", "Mirayan", "Narra", "Papandungin", "San Antonio", "Santa Maria", "Santa Theresa", "Tambong"]);
                    break;
                case "Bansud":
                    populateBarangays(["Select Barangay", "Alcadesma", "Bato", "Conrazon", "Malo", "Manihala", "Pag-asa", "Poblacion", "Proper Bansud", "Proper Tiguisan", "Rosacara", "Salcedo", "Sumagui", "Villa Pag-asa"]);
                    break;
                case "Bongabong":
                    populateBarangays(["Select Barangay", "Anilao", "Aplaya", "Bagumbayan I", "Bagumbayan II", "Batangan", "Bukal", "Camantigue", "Carmundo", "Cawayan", "Dayhagan", "Formon", "Hagan", "Hagupit", "Ipil", "Kaligtasan", "Labasan", "Labonan", "Libertad", "Lisap", "Luna", "Malitbog", "Mapang", "Masaguisi", "Mina de Oro", "Morente", "Ogbot", "Orconuma", "Poblacion", "Polusahi", "Sagana", "San Isidro", "San Jose", "San Juan", "Santa Cruz", "Sigange", "Tawas"]);
                    break;
                case "Roxas":
                    populateBarangays(["Select Barangay", "Bagumbayan", "Cantil", "Dangay", "Happy Valley", "Libertad", "Libtong", "Little Tanauan", "Mabuhay", "Maraska", "Odiong", "Paclasan", "San Aquilino", "San Isidro", "San Jose", "San Mariano", "San Miguel", "San Rafael", "San Vicente", "Uyao", "Victoria"]);
                    break;
                case "Mansalay":
                    populateBarangays(["Select Barangay", "B. del Mundo", "Balugo", "Bonbon", "Budburan", "Cabalwa", "Don Pedro", "Maliwanag", "Manaul", "Panaytayan", "Poblacion", "Roma", "Santa Brigida", "Santa Maria", "Santa Teresita", "Villa Celestial", "Wasig", "Waygan"]);
                    break;
                case "Bulalacao":
                    populateBarangays(["Select Barangay", "Bagong Sikat", "Balatasan", "Benli", "Cabugao", "Cambunang", "Campaasan", "Maasin", "Maujao", "Milagrosa", "Nasukob", "Poblacion", "San Francisco", "San Isidro", "San Juan", "San Roque"]);
                    break;
                default:
                    barangayDropdown.innerHTML = "<option value=''>Select Barangay</option>";
                    break;
            }
        }

        function populateBarangays(barangays) {
            const barangayDropdown = document.getElementById("state");
            barangays.forEach(barangay => {
                const option = document.createElement("option");
                option.text = barangay;
                option.value = barangay;
                barangayDropdown.add(option);
            });
        }
    </script>
</body>

</html>

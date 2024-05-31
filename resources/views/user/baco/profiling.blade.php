<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>PYDC</title>

    <link rel="stylesheet" href="../dash/assets/css/maicons.css">

    <link rel="stylesheet" href="../dash/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../dash/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../dash/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../dash/assets/css/theme.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Add some basic styling for the form */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: aliceblue;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 5px;
            font-size: 16px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        body {
           
            position: relative;
            
            /*background-color: #030b07*/
        }

        body::before {
            content: '';
            display: block;
            position: absolute;
            top: 4%;
            /* Adjust the percentage value to control the space at the top */
            left: 0;
            width: 100%;
            height: calc(96%);
            /* Adjust the percentage value to account for the space at the top */
            background: url(../dash/assets/img/reg1.png) no-repeat;
            background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                filter: blur(2px); /* Adjust the blur intensity */
                z-index: -1;
        }
    </style>
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="home"><span class="text-primary"> GO-YDD REGISTRATION FORM</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home#about">About</a>
                        </li>
                        @if ($data->isEmpty())
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/home#programs">Announcement</a>
                            </li>
                        @endif
                        @if ($data2->isEmpty())
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/home#announce">Past Events</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('BacoProfiling') }}">Profiling</a>
                        </li>
                        <x-app-layout></x-app-layout>
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>


    {{-- Message --}}
    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="page-section" id="profiling">
        <div class="container">
            <h1 class="text-center wow fadeInUp text-uppercase"
                style="font-family: San Serif;font-size:40px; color:white; margin-top:-50px;">Youth Profiling</h1>

            <form action="{{ url('baco-profile-save') }}" method="POST">
                @csrf
                <div class="row mt-5">
                    <div class="form-group col-sm-3">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="firstname" required>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="middle-name">Middle Name</label>
                        <input type="text" id="middle-name" name="middlename">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="lastname" required>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="suffix">Suffix</label>
                        <input type="text" id="suffix" name="suffix">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="form-group col-sm-3" style="display: none">
                        <label for="region">Region</label>
                        <input type="text" id="region" name="region" required value="IV-B">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="province">Province</label>
                        <input type="text" id="province" name="province" value="Oriental Mindoro" readonly>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="municipality">Municipality</label>
                        <select id="municipality" name="municipality" required onchange="updateBarangayOptions()">
                            <option>Select Municipality</option>
                            <option value="Baco">Baco</option>
                            <option value="Bansud">Bansud</option>
                            <option value="Bongabong">Bongabong</option>
                            <option value="Bulalacao">Bulalacao</option>
                            <option value="Calapan City">Calapan City</option>
                            <option value="Gloria">Gloria</option>
                            <option value="Mansalay">Mansalay</option>
                            <option value="Naujan">Naujan</option>
                            <option value="Pinamalayan">Pinamalayan</option>
                            <option value="Pola">Pola</option>
                            <option value="Puerto Galera">Puerto Galera</option>
                            <option value="Roxas">Roxas</option>
                            <option value="San Teodoro">San Teodoro</option>
                            <option value="Socorro">Socorro</option>
                            <option value="Victoria">Victoria</option>
                            <!-- Add more options for other municipalities -->
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="barangay">Barangay</label>
                        <select name="barangay" id="barangay" required>
                            <option>Select Barangay</option>
                            <optgroup id="barangay-baco" style="display: none;">
                                <option value="Alag" data-municipality="Baco">Alag</option>
                                <option value="Bangkatan" data-municipality="Baco">Bangkatan</option>
                                <option value="Baras" data-municipality="Baco">Baras</option>
                                <option value="Bayanan" data-municipality="Baco">Bayanan</option>
                                <option value="Burbuli" data-municipality="Baco">Burbuli</option>
                                <option value="Catwiran I" data-municipality="Baco">Catwiran I</option>
                                <option value="Catwiran II" data-municipality="Baco">Catwiran II</option>
                                <option value="Dulangan I" data-municipality="Baco">Dulangan I</option>
                                <option value="Dulangan II" data-municipality="Baco">Dulangan II</option>
                                <option value="Lantuyang" data-municipality="Baco">Lantuyang</option>
                                <option value="Lumang Bayan" data-municipality="Baco">Lumang Bayan</option>
                                <option value="Malapad" data-municipality="Baco">Malapad</option>
                                <option value="Mangangan I" data-municipality="Baco">Mangangan I</option>
                                <option value="Mangangan II" data-municipality="Baco">Mangangan II</option>
                                <option value="Mayabig" data-municipality="Baco">Mayabig</option>
                                <option value="Pambisan" data-municipality="Baco">Pambisan</option>
                                <option value="Poblacion" data-municipality="Baco">Poblacion</option>
                                <option value="Pulang-Tubig" data-municipality="Baco">Pulang-Tubig</option>
                                <option value="Putican-Cabulo" data-municipality="Baco">Putican-Cabulo</option>
                                <option value="San Andres" data-municipality="Baco">San Andres</option>
                                <option value="San Ignacio" data-municipality="Baco">San Ignacio</option>
                                <option value="Santa Cruz" data-municipality="Baco">Santa Cruz</option>
                                <option value="Santa Rosa I" data-municipality="Baco">Santa Rosa I</option>
                                <option value="Santa Rosa II" data-municipality="Baco">Santa Rosa II</option>
                                <option value="Tabon-tabon" data-municipality="Baco">Tabon-tabon</option>
                                <option value="Tagumpay" data-municipality="Baco">Tagumpay</option>
                                <option value="Water" data-municipality="Baco">Water</option>
                            </optgroup>
                            <optgroup id="barangay-bansud" style="display: none;">
                                <option value="Bato" data-municipality="Bansud">Bato</option>
                                <option value="Conrazon" data-municipality="Bansud">Conrazon</option>
                                <option value="Malo" data-municipality="Bansud">Malo</option>
                                <option value="Manihala" data-municipality="Bansud">Manihala</option>
                                <option value="Pag-asa" data-municipality="Bansud">Pag-asa</option>
                                <option value="Poblacion" data-municipality="Bansud">Poblacion</option>
                                <option value="Proper Bansud" data-municipality="Bansud">Proper Bansud</option>
                                <option value="Proper Tiguisan" data-municipality="Bansud">Proper Tiguisan</option>
                                <option value="Rosacara" data-municipality="Bansud">Rosacara</option>
                                <option value="Salcedo" data-municipality="Bansud">Salcedo</option>
                                <option value="Sumagui" data-municipality="Bansud">Sumagui</option>
                                <option value="Villa Pag-asa" data-municipality="Bansud">Villa Pag-asa</option>
                            </optgroup>

                            <optgroup id="barangay-bongabong" style="display: none;">
                                <option value="Anilao" data-municipality="Bongabong">Anilao</option>
                                <option value="Aplaya" data-municipality="Bongabong">Aplaya</option>
                                <option value="Bagumbayan I" data-municipality="Bongabong">Bagumbayan I</option>
                                <option value="Bagumbayan II" data-municipality="Bongabong">Bagumbayan II</option>
                                <option value="Batangan" data-municipality="Bongabong">Batangan</option>
                                <option value="Bukal" data-municipality="Bongabong">Bukal</option>
                                <option value="Camantigue" data-municipality="Bongabong">Camantigue</option>
                                <option value="Carmundo" data-municipality="Bongabong">Carmundo</option>
                                <option value="Cawayan" data-municipality="Bongabong">Cawayan</option>
                                <option value="Dayhagan" data-municipality="Bongabong">Dayhagan</option>
                                <option value="Formon" data-municipality="Bongabong">Formon</option>
                                <option value="Hagan" data-municipality="Bongabong">Hagan</option>
                                <option value="Hagupit" data-municipality="Bongabong">Hagupit</option>
                                <option value="Ipil" data-municipality="Bongabong">Ipil</option>
                                <option value="Kaligtasan" data-municipality="Bongabong">Kaligtasan</option>
                                <option value="Labasan" data-municipality="Bongabong">Labasan</option>
                                <option value="Labonan" data-municipality="Bongabong">Labonan</option>
                                <option value="Libertad" data-municipality="Bongabong">Libertad</option>
                                <option value="Lisap" data-municipality="Bongabong">Lisap</option>
                                <option value="Luna" data-municipality="Bongabong">Luna</option>
                                <option value="Malitbog" data-municipality="Bongabong">Malitbog</option>
                                <option value="Mapang" data-municipality="Bongabong">Mapang</option>
                                <option value="Masaguisi" data-municipality="Bongabong">Masaguisi</option>
                                <option value="Mina de Oro" data-municipality="Bongabong">Mina de Oro</option>
                                <option value="Morente" data-municipality="Bongabong">Morente</option>
                                <option value="Ogbot" data-municipality="Bongabong">Ogbot</option>
                                <option value="Orconuma" data-municipality="Bongabong">Orconuma</option>
                                <option value="Poblacion" data-municipality="Bongabong">Poblacion</option>
                                <option value="Polusahi" data-municipality="Bongabong">Polusahi</option>
                                <option value="Sagana" data-municipality="Bongabong">Sagana</option>
                                <option value="San Isidro" data-municipality="Bongabong">San Isidro</option>
                                <option value="San Jose" data-municipality="Bongabong">San Jose</option>
                                <option value="San Juan" data-municipality="Bongabong">San Juan</option>
                                <option value="Santa Cruz" data-municipality="Bongabong">Santa Cruz</option>
                                <option value="Sigange" data-municipality="Bongabong">Sigange</option>
                                <option value="Tawas" data-municipality="Bongabong">Tawas</option>
                            </optgroup>

                            <optgroup id="barangay-bulalacao" style="display: none;">
                                <option value="Bagong Sikat" data-municipality="Bulalacao">Bagong Sikat</option>
                                <option value="Balatasan" data-municipality="Bulalacao">Balatasan</option>
                                <option value="Benli" data-municipality="Bulalacao">Benli</option>
                                <option value="Cabugao" data-municipality="Bulalacao">Cabugao</option>
                                <option value="Cambunang" data-municipality="Bulalacao">Cambunang</option>
                                <option value="Campaasan" data-municipality="Bulalacao">Campaasan</option>
                                <option value="Maasin" data-municipality="Bulalacao">Maasin</option>
                                <option value="Maujao" data-municipality="Bulalacao">Maujao</option>
                                <option value="Milagrosa" data-municipality="Bulalacao">Milagrosa</option>
                                <option value="Nasukob" data-municipality="Bulalacao">Nasukob</option>
                                <option value="Poblacion" data-municipality="Bulalacao">Poblacion</option>
                                <option value="San Francisco" data-municipality="Bulalacao">San Francisco</option>
                                <option value="San Isidro" data-municipality="Bulalacao">San Isidro</option>
                                <option value="San Juan" data-municipality="Bulalacao">San Juan</option>
                                <option value="San Roque" data-municipality="Bulalacao">San Roque</option>
                            </optgroup>

                            <optgroup id="barangay-calapan city" style="display: none;">
                                <option value="Balingayan" data-municipality="Calapan">Balingayan</option>
                                <option value="Balite" data-municipality="Calapan">Balite</option>
                                <option value="Baruyan" data-municipality="Calapan">Baruyan</option>
                                <option value="Batino" data-municipality="Calapan">Batino</option>
                                <option value="Bayanan I" data-municipality="Calapan">Bayanan I</option>
                                <option value="Bayanan II" data-municipality="Calapan">Bayanan II</option>
                                <option value="Biga" data-municipality="Calapan">Biga</option>
                                <option value="Bondoc" data-municipality="Calapan">Bondoc</option>
                                <option value="Bucayao" data-municipality="Calapan">Bucayao</option>
                                <option value="Buhuan" data-municipality="Calapan">Buhuan</option>
                                <option value="Bulusan" data-municipality="Calapan">Bulusan</option>
                                <option value="Calero" data-municipality="Calapan">Calero</option>
                                <option value="Camansihan" data-municipality="Calapan">Camansihan</option>
                                <option value="Camilmil" data-municipality="Calapan">Camilmil</option>
                                <option value="Canubing I" data-municipality="Calapan">Canubing I</option>
                                <option value="Canubing II" data-municipality="Calapan">Canubing II</option>
                                <option value="Comunal" data-municipality="Calapan">Comunal</option>
                                <option value="Guinobatan" data-municipality="Calapan">Guinobatan</option>
                                <option value="Gulod" data-municipality="Calapan">Gulod</option>
                                <option value="Gutad" data-municipality="Calapan">Gutad</option>
                                <option value="Ibaba East" data-municipality="Calapan">Ibaba East</option>
                                <option value="Ibaba West" data-municipality="Calapan">Ibaba West</option>
                                <option value="Ilaya" data-municipality="Calapan">Ilaya</option>
                                <option value="Lalud" data-municipality="Calapan">Lalud</option>
                                <option value="Lazareto" data-municipality="Calapan">Lazareto</option>
                                <option value="Libis" data-municipality="Calapan">Libis</option>
                                <option value="Lumang Bayan" data-municipality="Calapan">Lumang Bayan</option>
                                <option value="Mahal na Pangalan" data-municipality="Calapan">Mahal na Pangalan
                                </option>
                                <option value="Maidlang" data-municipality="Calapan">Maidlang</option>
                                <option value="Malad" data-municipality="Calapan">Malad</option>
                                <option value="Malamig" data-municipality="Calapan">Malamig</option>
                                <option value="Managpi" data-municipality="Calapan">Managpi</option>
                                <option value="Masipit" data-municipality="Calapan">Masipit</option>
                                <option value="Nag-iba I" data-municipality="Calapan">Nag-iba I</option>
                                <option value="Nag-iba II" data-municipality="Calapan">Nag-iba II</option>
                                <option value="Navotas" data-municipality="Calapan">Navotas</option>
                                <option value="Pachoca" data-municipality="Calapan">Pachoca</option>
                                <option value="Palhi" data-municipality="Calapan">Palhi</option>
                                <option value="Panggalaan" data-municipality="Calapan">Panggalaan</option>
                                <option value="Parang" data-municipality="Calapan">Parang</option>
                                <option value="Patas" data-municipality="Calapan">Patas</option>
                                <option value="Personas" data-municipality="Calapan">Personas</option>
                                <option value="Putingtubig" data-municipality="Calapan">Putingtubig</option>
                                <option value="Salong" data-municipality="Calapan">Salong</option>
                                <option value="San Antonio" data-municipality="Calapan">San Antonio</option>
                                <option value="San Vicente Central" data-municipality="Calapan">San Vicente Central
                                </option>
                                <option value="San Vicente East" data-municipality="Calapan">San Vicente East</option>
                                <option value="San Vicente North" data-municipality="Calapan">San Vicente North
                                </option>
                                <option value="San Vicente South" data-municipality="Calapan">San Vicente South
                                </option>
                                <option value="San Vicente West" data-municipality="Calapan">San Vicente West</option>
                                <option value="Santa Cruz" data-municipality="Calapan">Santa Cruz</option>
                                <option value="Santa Isabel" data-municipality="Calapan">Santa Isabel</option>
                                <option value="Santa Maria Village" data-municipality="Calapan">Santa Maria Village
                                </option>
                                <option value="Santa Rita" data-municipality="Calapan">Santa Rita</option>
                                <option value="Santo Niño" data-municipality="Calapan">Santo Niño</option>
                                <option value="Sapul" data-municipality="Calapan">Sapul</option>
                                <option value="Silonay" data-municipality="Calapan">Silonay</option>
                                <option value="Suqui" data-municipality="Calapan">Suqui</option>
                                <option value="Tawagan" data-municipality="Calapan">Tawagan</option>
                                <option value="Tawiran" data-municipality="Calapan">Tawiran</option>
                                <option value="Tibag" data-municipality="Calapan">Tibag</option>
                                <option value="Wawa" data-municipality="Calapan">Wawa</option>
                            </optgroup>

                            <optgroup id="barangay-gloria" style="display: none;">
                                <option value="Agos" data-municipality="Gloria">Agos</option>
                                <option value="Agsalin" data-municipality="Gloria">Agsalin</option>
                                <option value="Alma Villa" data-municipality="Gloria">Alma Villa</option>
                                <option value="Andres Bonifacio" data-municipality="Gloria">Andres Bonifacio</option>
                                <option value="Balete" data-municipality="Gloria">Balete</option>
                                <option value="Banus" data-municipality="Gloria">Banus</option>
                                <option value="Banutan" data-municipality="Gloria">Banutan</option>
                                <option value="Bulaklakan" data-municipality="Gloria">Bulaklakan</option>
                                <option value="Buong Lupa" data-municipality="Gloria">Buong Lupa</option>
                                <option value="Gaudencio Antonino" data-municipality="Gloria">Gaudencio Antonino
                                </option>
                                <option value="Guimbonan" data-municipality="Gloria">Guimbonan</option>
                                <option value="Kawit" data-municipality="Gloria">Kawit</option>
                                <option value="Lucio Laurel" data-municipality="Gloria">Lucio Laurel</option>
                                <option value="Macario Adriatico" data-municipality="Gloria">Macario Adriatico
                                </option>
                                <option value="Malamig" data-municipality="Gloria">Malamig</option>
                                <option value="Malayong" data-municipality="Gloria">Malayong</option>
                                <option value="Maligaya" data-municipality="Gloria">Maligaya</option>
                                <option value="Malubay" data-municipality="Gloria">Malubay</option>
                                <option value="Manguyang" data-municipality="Gloria">Manguyang</option>
                                <option value="Maragooc" data-municipality="Gloria">Maragooc</option>
                                <option value="Mirayan" data-municipality="Gloria">Mirayan</option>
                                <option value="Narra" data-municipality="Gloria">Narra</option>
                                <option value="Papandungin" data-municipality="Gloria">Papandungin</option>
                                <option value="San Antonio" data-municipality="Gloria">San Antonio</option>
                                <option value="Santa Maria" data-municipality="Gloria">Santa Maria</option>
                                <option value="Santa Theresa" data-municipality="Gloria">Santa Theresa</option>
                                <option value="Tambong" data-municipality="Gloria">Tambong</option>
                            </optgroup>

                            <optgroup id="barangay-mansalay" style="display: none;">
                                <option value="B. del Mundo" data-municipality="Mansalay">B. del Mundo</option>
                                <option value="Balugo" data-municipality="Mansalay">Balugo</option>
                                <option value="Bonbon" data-municipality="Mansalay">Bonbon</option>
                                <option value="Budburan" data-municipality="Mansalay">Budburan</option>
                                <option value="Cabalwa" data-municipality="Mansalay">Cabalwa</option>
                                <option value="Don Pedro" data-municipality="Mansalay">Don Pedro</option>
                                <option value="Maliwanag" data-municipality="Mansalay">Maliwanag</option>
                                <option value="Manaul" data-municipality="Mansalay">Manaul</option>
                                <option value="Panaytayan" data-municipality="Mansalay">Panaytayan</option>
                                <option value="Poblacion" data-municipality="Mansalay">Poblacion</option>
                                <option value="Roma" data-municipality="Mansalay">Roma</option>
                                <option value="Santa Brigida" data-municipality="Mansalay">Santa Brigida</option>
                                <option value="Santa Maria" data-municipality="Mansalay">Santa Maria</option>
                                <option value="Santa Teresita" data-municipality="Mansalay">Santa Teresita</option>
                                <option value="Villa Celestial" data-municipality="Mansalay">Villa Celestial</option>
                                <option value="Wasig" data-municipality="Mansalay">Wasig</option>
                                <option value="Waygan" data-municipality="Mansalay">Waygan</option>
                            </optgroup>

                            <optgroup id="barangay-naujan" style="display: none;">
                                <option value="Adrialuna" data-municipality="Naujan">Adrialuna</option>
                                <option value="Andres Ilagan" data-municipality="Naujan">Andres Ilagan</option>
                                <option value="Antipolo" data-municipality="Naujan">Antipolo</option>
                                <option value="Apitong" data-municipality="Naujan">Apitong</option>
                                <option value="Arangin" data-municipality="Naujan">Arangin</option>
                                <option value="Aurora" data-municipality="Naujan">Aurora</option>
                                <option value="Bacungan" data-municipality="Naujan">Bacungan</option>
                                <option value="Bagong Buhay" data-municipality="Naujan">Bagong Buhay</option>
                                <option value="Balite" data-municipality="Naujan">Balite</option>
                                <option value="Bancuro" data-municipality="Naujan">Bancuro</option>
                                <option value="Banuton" data-municipality="Naujan">Banuton</option>
                                <option value="Barcenaga" data-municipality="Naujan">Barcenaga</option>
                                <option value="Bayani" data-municipality="Naujan">Bayani</option>
                                <option value="Buhangin" data-municipality="Naujan">Buhangin</option>
                                <option value="Caburo" data-municipality="Naujan">Caburo</option>
                                <option value="Concepcion" data-municipality="Naujan">Concepcion</option>
                                <option value="Dao" data-municipality="Naujan">Dao</option>
                                <option value="Del Pilar" data-municipality="Naujan">Del Pilar</option>
                                <option value="Estrella" data-municipality="Naujan">Estrella</option>
                                <option value="Evangelista" data-municipality="Naujan">Evangelista</option>
                                <option value="Gamao" data-municipality="Naujan">Gamao</option>
                                <option value="General Esco" data-municipality="Naujan">General Esco</option>
                                <option value="Herrera" data-municipality="Naujan">Herrera</option>
                                <option value="Inarawan" data-municipality="Naujan">Inarawan</option>
                                <option value="Kalinisan" data-municipality="Naujan">Kalinisan</option>
                                <option value="Laguna" data-municipality="Naujan">Laguna</option>
                                <option value="Mabini" data-municipality="Naujan">Mabini</option>
                                <option value="Magtibay" data-municipality="Naujan">Magtibay</option>
                                <option value="Mahabang Parang" data-municipality="Naujan">Mahabang Parang</option>
                                <option value="Malaya" data-municipality="Naujan">Malaya</option>
                                <option value="Malinao" data-municipality="Naujan">Malinao</option>
                                <option value="Malvar" data-municipality="Naujan">Malvar</option>
                                <option value="Masagana" data-municipality="Naujan">Masagana</option>
                                <option value="Masaguing" data-municipality="Naujan">Masaguing</option>
                                <option value="Melgar A" data-municipality="Naujan">Melgar A</option>
                                <option value="Melgar B" data-municipality="Naujan">Melgar B</option>
                                <option value="Metolza" data-municipality="Naujan">Metolza</option>
                                <option value="Montelago" data-municipality="Naujan">Montelago</option>
                                <option value="Montemayor" data-municipality="Naujan">Montemayor</option>
                                <option value="Motoderazo" data-municipality="Naujan">Motoderazo</option>
                                <option value="Mulawin" data-municipality="Naujan">Mulawin</option>
                                <option value="Nag-iba I" data-municipality="Naujan">Nag-iba I</option>
                                <option value="Nag-iba II" data-municipality="Naujan">Nag-iba II</option>
                                <option value="Pagkakaisa" data-municipality="Naujan">Pagkakaisa</option>
                                <option value="Paitan" data-municipality="Naujan">Paitan</option>
                                <option value="Paniquian" data-municipality="Naujan">Paniquian</option>
                                <option value="Pinagsabangan I" data-municipality="Naujan">Pinagsabangan I</option>
                                <option value="Pinagsabangan II" data-municipality="Naujan">Pinagsabangan II</option>
                                <option value="Piñahan" data-municipality="Naujan">Piñahan</option>
                                <option value="Poblacion I" data-municipality="Naujan">Poblacion I</option>
                                <option value="Poblacion II" data-municipality="Naujan">Poblacion II</option>
                                <option value="Poblacion III" data-municipality="Naujan">Poblacion III</option>
                                <option value="Sampaguita" data-municipality="Naujan">Sampaguita</option>
                                <option value="San Agustin I" data-municipality="Naujan">San Agustin I</option>
                                <option value="San Agustin II" data-municipality="Naujan">San Agustin II</option>
                                <option value="San Andres" data-municipality="Naujan">San Andres</option>
                                <option value="San Antonio" data-municipality="Naujan">San Antonio</option>
                                <option value="San Carlos" data-municipality="Naujan">San Carlos</option>
                                <option value="San Isidro" data-municipality="Naujan">San Isidro</option>
                                <option value="San Jose" data-municipality="Naujan">San Jose</option>
                                <option value="San Luis" data-municipality="Naujan">San Luis</option>
                                <option value="San Nicolas" data-municipality="Naujan">San Nicolas</option>
                                <option value="San Pedro" data-municipality="Naujan">San Pedro</option>
                                <option value="Santa Cruz" data-municipality="Naujan">Santa Cruz</option>
                                <option value="Santa Isabel" data-municipality="Naujan">Santa Isabel</option>
                                <option value="Santa Maria" data-municipality="Naujan">Santa Maria</option>
                                <option value="Santiago" data-municipality="Naujan">Santiago</option>
                                <option value="Santo Niño" data-municipality="Naujan">Santo Niño</option>
                                <option value="Tagumpay" data-municipality="Naujan">Tagumpay</option>
                                <option value="Tigkan" data-municipality="Naujan">Tigkan</option>
                            </optgroup>

                            <optgroup id="barangay-pinamalayan" style="display: none;">
                                <option value="Anoling" data-municipality="Pinamalayan">Anoling</option>
                                <option value="Bacungan" data-municipality="Pinamalayan">Bacungan</option>
                                <option value="Bangbang" data-municipality="Pinamalayan">Bangbang</option>
                                <option value="Banilad" data-municipality="Pinamalayan">Banilad</option>
                                <option value="Buli" data-municipality="Pinamalayan">Buli</option>
                                <option value="Cacawan" data-municipality="Pinamalayan">Cacawan</option>
                                <option value="Calingag" data-municipality="Pinamalayan">Calingag</option>
                                <option value="Del Razon" data-municipality="Pinamalayan">Del Razon</option>
                                <option value="Guinhawa" data-municipality="Pinamalayan">Guinhawa</option>
                                <option value="Inclanay" data-municipality="Pinamalayan">Inclanay</option>
                                <option value="Lumangbayan" data-municipality="Pinamalayan">Lumangbayan</option>
                                <option value="Malaya" data-municipality="Pinamalayan">Malaya</option>
                                <option value="Maliangcog" data-municipality="Pinamalayan">Maliangcog</option>
                                <option value="Maningcol" data-municipality="Pinamalayan">Maningcol</option>
                                <option value="Marayos" data-municipality="Pinamalayan">Marayos</option>
                                <option value="Marfrancisco" data-municipality="Pinamalayan">Marfrancisco</option>
                                <option value="Nabuslot" data-municipality="Pinamalayan">Nabuslot</option>
                                <option value="Pagalagala" data-municipality="Pinamalayan">Pagalagala</option>
                                <option value="Palayan" data-municipality="Pinamalayan">Palayan</option>
                                <option value="Pambisan Malaki" data-municipality="Pinamalayan">Pambisan Malaki
                                </option>
                                <option value="Pambisan Munti" data-municipality="Pinamalayan">Pambisan Munti</option>
                                <option value="Panggulayan" data-municipality="Pinamalayan">Panggulayan</option>
                                <option value="Papandayan" data-municipality="Pinamalayan">Papandayan</option>
                                <option value="Pili" data-municipality="Pinamalayan">Pili</option>
                                <option value="Quinabigan" data-municipality="Pinamalayan">Quinabigan</option>
                                <option value="Ranzo" data-municipality="Pinamalayan">Ranzo</option>
                                <option value="Rosario" data-municipality="Pinamalayan">Rosario</option>
                                <option value="Sabang" data-municipality="Pinamalayan">Sabang</option>
                                <option value="Santa Isabel" data-municipality="Pinamalayan">Santa Isabel</option>
                                <option value="Santa Maria" data-municipality="Pinamalayan">Santa Maria</option>
                                <option value="Santa Rita" data-municipality="Pinamalayan">Santa Rita</option>
                                <option value="Santo Niño" data-municipality="Pinamalayan">Santo Niño</option>
                                <option value="Wawa" data-municipality="Pinamalayan">Wawa</option>
                                <option value="Zone I" data-municipality="Pinamalayan">Zone I</option>
                                <option value="Zone II" data-municipality="Pinamalayan">Zone II</option>
                                <option value="Zone III" data-municipality="Pinamalayan">Zone III</option>
                                <option value="Zone IV" data-municipality="Pinamalayan">Zone IV</option>
                            </optgroup>

                            <optgroup id="barangay-pola" style="display: none;">
                                <option value="Bacawan" data-municipality="Pola">Bacawan</option>
                                <option value="Bacungan" data-municipality="Pola">Bacungan</option>
                                <option value="Batuhan" data-municipality="Pola">Batuhan</option>
                                <option value="Bayanan" data-municipality="Pola">Bayanan</option>
                                <option value="Biga" data-municipality="Pola">Biga</option>
                                <option value="Buhay na Tubig" data-municipality="Pola">Buhay na Tubig</option>
                                <option value="Calima" data-municipality="Pola">Calima</option>
                                <option value="Calubasanhon" data-municipality="Pola">Calubasanhon</option>
                                <option value="Campamento" data-municipality="Pola">Campamento</option>
                                <option value="Casiligan" data-municipality="Pola">Casiligan</option>
                                <option value="Malibago" data-municipality="Pola">Malibago</option>
                                <option value="Maluanluan" data-municipality="Pola">Maluanluan</option>
                                <option value="Matulatula" data-municipality="Pola">Matulatula</option>
                                <option value="Misong" data-municipality="Pola">Misong</option>
                                <option value="Pahilahan" data-municipality="Pola">Pahilahan</option>
                                <option value="Panikihan" data-municipality="Pola">Panikihan</option>
                                <option value="Pula" data-municipality="Pola">Pula</option>
                                <option value="Puting Cacao" data-municipality="Pola">Puting Cacao</option>
                                <option value="Tagbakin" data-municipality="Pola">Tagbakin</option>
                                <option value="Tagumpay" data-municipality="Pola">Tagumpay</option>
                                <option value="Tiguihan" data-municipality="Pola">Tiguihan</option>
                                <option value="Zone I" data-municipality="Pola">Zone I</option>
                                <option value="Zone II" data-municipality="Pola">Zone II</option>
                            </optgroup>

                            <optgroup id="barangay-puerto galera" style="display: none;">
                                <option value="Aninuan" data-municipality="Puerto Galera">Aninuan</option>
                                <option value="Baclayan" data-municipality="Puerto Galera">Baclayan</option>
                                <option value="Balatero" data-municipality="Puerto Galera">Balatero</option>
                                <option value="Dulangan" data-municipality="Puerto Galera">Dulangan</option>
                                <option value="Palangan" data-municipality="Puerto Galera">Palangan</option>
                                <option value="Poblacion" data-municipality="Puerto Galera">Poblacion</option>
                                <option value="Sabang" data-municipality="Puerto Galera">Sabang</option>
                                <option value="San Antonio" data-municipality="Puerto Galera">San Antonio</option>
                                <option value="San Isidro" data-municipality="Puerto Galera">San Isidro</option>
                                <option value="Santo Niño" data-municipality="Puerto Galera">Santo Niño</option>
                                <option value="Sinandigan" data-municipality="Puerto Galera">Sinandigan</option>
                                <option value="Tabinay" data-municipality="Puerto Galera">Tabinay</option>
                                <option value="Villaflor" data-municipality="Puerto Galera">Villaflor</option>
                            </optgroup>

                            <optgroup id="barangay-roxas" style="display: none;">
                                <option value="Bagumbayan" data-municipality="Roxas">Bagumbayan</option>
                                <option value="Cantil" data-municipality="Roxas">Cantil</option>
                                <option value="Dangay" data-municipality="Roxas">Dangay</option>
                                <option value="Happy Valley" data-municipality="Roxas">Happy Valley</option>
                                <option value="Libertad" data-municipality="Roxas">Libertad</option>
                                <option value="Libtong" data-municipality="Roxas">Libtong</option>
                                <option value="Little Tanauan" data-municipality="Roxas">Little Tanauan</option>
                                <option value="Mabuhay" data-municipality="Roxas">Mabuhay</option>
                                <option value="Maraska" data-municipality="Roxas">Maraska</option>
                                <option value="Odiong" data-municipality="Roxas">Odiong</option>
                                <option value="Paclasan" data-municipality="Roxas">Paclasan</option>
                                <option value="San Aquilino" data-municipality="Roxas">San Aquilino</option>
                                <option value="San Isidro" data-municipality="Roxas">San Isidro</option>
                                <option value="San Jose" data-municipality="Roxas">San Jose</option>
                                <option value="San Mariano" data-municipality="Roxas">San Mariano</option>
                                <option value="San Miguel" data-municipality="Roxas">San Miguel</option>
                                <option value="San Rafael" data-municipality="Roxas">San Rafael</option>
                                <option value="San Vicente" data-municipality="Roxas">San Vicente</option>
                                <option value="Uyao" data-municipality="Roxas">Uyao</option>
                                <option value="Victoria" data-municipality="Roxas">Victoria</option>
                            </optgroup>

                            <optgroup id="barangay-san teodoro" style="display: none;">
                                <option value="Bigaan" data-municipality="San Teodoro">Bigaan</option>
                                <option value="Caagutayan" data-municipality="San Teodoro">Caagutayan</option>
                                <option value="Calangatan" data-municipality="San Teodoro">Calangatan</option>
                                <option value="Calsapa" data-municipality="San Teodoro">Calsapa</option>
                                <option value="Ilag" data-municipality="San Teodoro">Ilag</option>
                                <option value="Lumangbayan" data-municipality="San Teodoro">Lumangbayan</option>
                                <option value="Poblacion" data-municipality="San Teodoro">Poblacion</option>
                                <option value="Tacligan" data-municipality="San Teodoro">Tacligan</option>
                            </optgroup>

                            <optgroup id="barangay-socorro" style="display: none;">
                                <option value="Bagsok" data-municipality="Socorro">Bagsok</option>
                                <option value="Batong Dalig" data-municipality="Socorro">Batong Dalig</option>
                                <option value="Bayuin" data-municipality="Socorro">Bayuin</option>
                                <option value="Bugtong na Tuog" data-municipality="Socorro">Bugtong na Tuog</option>
                                <option value="Calocmoy" data-municipality="Socorro">Calocmoy</option>
                                <option value="Calubayan" data-municipality="Socorro">Calubayan</option>
                                <option value="Catiningan" data-municipality="Socorro">Catiningan</option>
                                <option value="Fortuna" data-municipality="Socorro">Fortuna</option>
                                <option value="Happy Valley" data-municipality="Socorro">Happy Valley</option>
                                <option value="Leuteboro I" data-municipality="Socorro">Leuteboro I</option>
                                <option value="Leuteboro II" data-municipality="Socorro">Leuteboro II</option>
                                <option value="Ma. Concepcion" data-municipality="Socorro">Ma. Concepcion</option>
                                <option value="Mabuhay I" data-municipality="Socorro">Mabuhay I</option>
                                <option value="Mabuhay II" data-municipality="Socorro">Mabuhay II</option>
                                <option value="Malugay" data-municipality="Socorro">Malugay</option>
                                <option value="Matungao" data-municipality="Socorro">Matungao</option>
                                <option value="Monteverde" data-municipality="Socorro">Monteverde</option>
                                <option value="Pasi I" data-municipality="Socorro">Pasi I</option>
                                <option value="Pasi II" data-municipality="Socorro">Pasi II</option>
                                <option value="Santo Domingo" data-municipality="Socorro">Santo Domingo</option>
                                <option value="Subaan" data-municipality="Socorro">Subaan</option>
                                <option value="Villareal" data-municipality="Socorro">Villareal</option>
                                <option value="Zone I" data-municipality="Socorro">Zone I</option>
                                <option value="Zone II" data-municipality="Socorro">Zone II</option>
                                <option value="Zone III" data-municipality="Socorro">Zone III</option>
                                <option value="Zone IV" data-municipality="Socorro">Zone IV</option>
                            </optgroup>

                            <optgroup id="barangay-victoria" style="display: none;">
                                <option value="Alcate" data-municipality="Victoria">Alcate</option>
                                <option value="Antonino" data-municipality="Victoria">Antonino</option>
                                <option value="Babangonan" data-municipality="Victoria">Babangonan</option>
                                <option value="Bagong Buhay" data-municipality="Victoria">Bagong Buhay</option>
                                <option value="Bagong Silang" data-municipality="Victoria">Bagong Silang</option>
                                <option value="Bambanin" data-municipality="Victoria">Bambanin</option>
                                <option value="Bethel" data-municipality="Victoria">Bethel</option>
                                <option value="Canaan" data-municipality="Victoria">Canaan</option>
                                <option value="Concepcion" data-municipality="Victoria">Concepcion</option>
                                <option value="Duongan" data-municipality="Victoria">Duongan</option>
                                <option value="Jose Leido Jr." data-municipality="Victoria">Jose Leido Jr.</option>
                                <option value="Loyal" data-municipality="Victoria">Loyal</option>
                                <option value="Mabini" data-municipality="Victoria">Mabini</option>
                                <option value="Macatoc" data-municipality="Victoria">Macatoc</option>
                                <option value="Malabo" data-municipality="Victoria">Malabo</option>
                                <option value="Merit" data-municipality="Victoria">Merit</option>
                                <option value="Ordovilla" data-municipality="Victoria">Ordovilla</option>
                                <option value="Pakyas" data-municipality="Victoria">Pakyas</option>
                                <option value="Poblacion I" data-municipality="Victoria">Poblacion I</option>
                                <option value="Poblacion II" data-municipality="Victoria">Poblacion II</option>
                                <option value="Poblacion III" data-municipality="Victoria">Poblacion III</option>
                                <option value="Poblacion IV" data-municipality="Victoria">Poblacion IV</option>
                                <option value="Sampaguita" data-municipality="Victoria">Sampaguita</option>
                                <option value="San Antonio" data-municipality="Victoria">San Antonio</option>
                                <option value="San Cristobal" data-municipality="Victoria">San Cristobal</option>
                                <option value="San Gabriel" data-municipality="Victoria">San Gabriel</option>
                                <option value="San Gelacio" data-municipality="Victoria">San Gelacio</option>
                                <option value="San Isidro" data-municipality="Victoria">San Isidro</option>
                                <option value="San Juan" data-municipality="Victoria">San Juan</option>
                                <option value="San Narciso" data-municipality="Victoria">San Narciso</option>
                                <option value="Urdaneta" data-municipality="Victoria">Urdaneta</option>
                                <option value="Villa Cerveza" data-municipality="Victoria">Villa Cerveza</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="purok">Purok / Sitio</label>
                        <input type="text" id="purok" name="purok">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="form-group col-sm-3">
                        <label for="sex">Sex</label>
                        <select id="sex" name="sex" required>
                            <option>Select Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="bday">Birthday</label>
                        <input type="date" id="bday" name="bday" required onchange="calculateAge()">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" required readonly>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="phone">Phone Number</label>
                        <input type="number" id="phone" name="phone">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="form-group col-sm-3" style="border-right:3px solid grey;">
                        <label style=" font-size:20px; font-weight:bolder;">Civil Status</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="radio" id="single" name="status" value="Single" required>
                                <label for="single">Single</label>

                                <input type="radio" id="married" name="status" value="Married">
                                <label for="married">Married</label>

                                <input type="radio" id="widowed" name="status" value="Widowed">
                                <label for="widowed">Widowed</label>

                                <input type="radio" id="divorced" name="status" value="Divorced">
                                <label for="divorced">Divorced</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="radio" id="separated" name="status" value="Separated">
                                <label for="separated">Separated</label>

                                <input type="radio" id="annulled" name="status" value="Annulled">
                                <label for="annulled">Annulled</label>

                                <input type="radio" id="unknown" name="status" value="Unknown">
                                <label for="unknown">Unknown</label>

                                <input type="radio" id="live-in" name="status" value="Live-in">
                                <label for="live-in">Live-in</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-sm-3 " style="border-right:3px solid grey;">
                        <label style="font-size:20px; font-weight:bolder;">Youth Classification</label>
                        <input type="radio" id="inschool" name="youthclass" value="In School Youth">
                        <label for="inschool">In School Youth</label>

                        <input type="radio" id="outschool" name="youthclass" value="Out of School Youth">
                        <label for="outschool">Out of School Youth</label>

                        <input type="radio" id="working" name="youthclass" value="Working Youth">
                        <label for="working">Working Youth</label>

                        <input type="radio" id="youthneeds" name="youthclass"
                            value="Youth with Specific Needs">
                        <label for="youthneeds">Youth with Specific Needs</label>
                    </div>
                    <div class="form-group col-sm-3 " style="border-right:3px solid grey;">
                        <label style="font-size:20px; font-weight:bolder;">Youth Age Group</label>
                        <input type="radio" id="childyouth" name="youthage" value="Child Youth">
                        <label for="childyouth">Child Youth (13-17 yrs old)</label>

                        <input type="radio" id="coreyouth" name="youthage" value="Core Youth">
                        <label for="coreyouth">Core Youth (18-24 yrs old)</label>

                        <input type="radio" id="youngadult" name="youthage" value="Young Adult">
                        <label for="youngadult">Young Adult (25-30 yrs old)</label>
                    </div>

                    <div class="form-group col-sm-3 ">
                        <label style=" font-size:20px; font-weight:bolder;">Work Status</label>
                        <input type="radio" id="employee" name="workstat" value="Employee">
                        <label for="employee">Employee</label>

                        <input type="radio" id="unemployed" name="workstat" value="Unemployed">
                        <label for="unemployed">Unemployed</label>

                        <input type="radio" id="selfemp" name="workstat" value="Self-Employed">
                        <label for="selfemp">Self-Employed</label>

                        <input type="radio" id="looking" name="workstat"
                            value="Currently Looking for a Job">
                        <label for="looking">Currently Looking for a Job</label>

                        <input type="radio" id="notint" name="workstat"
                            value="Not Interested Looking for a Job">
                        <label for="notint">Not Interested Looking for a Job</label>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="form-group col-sm-3" style="border-right:3px solid grey;">
                        <label style=" font-size:20px; font-weight:bolder;">Educational Background</label>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="radio" id="elem1" name="educback" value="Elementary Level">
                                <label for="elem1">Elementary Level</label>

                                <input type="radio" id="elem2" name="educback" value="Elementary Grad">
                                <label for="elem2">Elementary Grad</label>

                                <input type="radio" id="elem3" name="educback" value="High School Level">
                                <label for="elem3">High School Level</label>

                                <input type="radio" id="elem4" name="educback" value="High School Grad">
                                <label for="elem4">High School Grad</label>

                                <input type="radio" id="elem5" name="educback" value="Vocational Grad">
                                <label for="elem5">Vocational Grad</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="radio" id="elem6" name="educback" value="College Level">
                                <label for="elem6">College Level</label>

                                <input type="radio" id="elem7" name="educback" value="College Grad">
                                <label for="elem7">College Grad</label>

                                <input type="radio" id="elem8" name="educback" value="Masteral Level">
                                <label for="elem8">Masteral Level</label>

                                <input type="radio" id="elem9" name="educback" value="Masteral Grad">
                                <label for="elem9">Masteral Grad</label>

                                <input type="radio" id="elem10" name="educback" value="Doctorate Level">
                                <label for="elem10">Doctorate Level</label>

                                <input type="radio" id="elem11" name="educback" value="Doctorate Grad">
                                <label for="elem11">Doctorate Grad</label>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-sm-3" style="border-right:3px solid grey;">
                        <label style=" font-size:20px; font-weight:bolder;">Registered SK Voter?</label>
                        <input type="radio" id="sk_yes" name="skvoter" value="Yes"
                            onchange="toggleSKLastQuestion()">
                        <label for="sk_yes">YES</label>

                        <input type="radio" id="sk_no" name="skvoter" value="No"
                            onchange="toggleSKLastQuestion()">
                        <label for="sk_no">NO</label>

                        <div id="sk_last_question" style="display: none;">
                            <label class="mt-5" style=" font-size:20px; font-weight:bolder;">Did you
                                vote last SK election?</label>
                            <input type="radio" id="sklast_yes" name="skvoterlast" value="Yes">
                            <label for="sklast_yes">YES</label>

                            <input type="radio" id="sklast_no" name="skvoterlast" value="No">
                            <label for="sklast_no">NO</label>
                        </div>
                    </div>
                    <div class="form-group col-sm-3" style="border-right:3px solid grey;">
                        <label style="font-size:20px; font-weight:bolder;">Registered National
                            Voter?</label>
                        <input type="radio" id="national_yes" name="nationalvoter" value="Yes">
                        <label for="national_yes">YES</label>

                        <input type="radio" id="national_no" name="nationalvoter" value="No">
                        <label for="national_no">NO</label>
                    </div>

                    <div class="form-group col-sm-3">
                        <label style=" font-size:20px; font-weight:bolder;">Have you already attended a KK
                            Assembly?</label>
                        <input type="radio" id="assemb_yes" name="assembly" value="Yes"
                            onchange="toggleAssemblyQuestion()">
                        <label for="assemb_yes">YES</label>

                        <input type="radio" id="assemb_no" name="assembly" value="No"
                            onchange="toggleAssemblyQuestion()">
                        <label for="assemb_no">NO</label>

                        <div id="assembly_yes" class="mt-5" style="display: none;">
                            <label style=" font-size:20px; font-weight:bolder;">Have many times did you
                                attend?</label>
                            <input type="radio" id="assemb_1-2" name="assembly_attend" value="1-2 times">
                            <label for="assemb_1-2">1-2 Times</label>

                            <input type="radio" id="assemb_3-4" name="assembly_attend" value="3-4 times">
                            <label for="assemb_3-4">3-4 Times</label>

                            <input type="radio" id="assemb_5" name="assembly_attend" value="5 and above">
                            <label for="assemb_5">5 and above</label>
                        </div>

                        <div id="assembly_no" class="mt-5" style="display: none;">
                            <label style=" font-size:20px; font-weight:bolder;">Why you didn't
                                attend?</label>
                            <input type="radio" id="assemb_noass" name="assembly_noattend"
                                value="There was no SK Assembly Meeting">
                            <label for="assemb_noass">There was no KK Assembly Meeting</label>

                            <input type="radio" id="assemb_notint" name="assembly_noattend"
                                value="Not Interested to Attend">
                            <label for="assemb_notint">Not Interested to Attend</label>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mt-3 wow zoomIn" style="color:black;">Register
                    Profile</button>
            </form>
        </div>
    </div>
    <script>
        function updateBarangayOptions() {
            // Get the selected municipality value
            var selectedMunicipality = document.getElementById("municipality").value;

            // Hide all Barangay select elements
            var barangaySelects = document.querySelectorAll("[id^='barangay-']");
            for (var i = 0; i < barangaySelects.length; i++) {
                barangaySelects[i].style.display = "none";
            }

            // Show the Barangay select element for the selected municipality
            var selectedBarangaySelect = document.getElementById("barangay-" + selectedMunicipality.toLowerCase());
            if (selectedBarangaySelect) {
                selectedBarangaySelect.style.display = "block";
            }
        }
    </script>

    <script>
        function calculateAge() {
            var birthday = new Date(document.getElementById("bday").value);
            var age = calculateAgeFromDate(birthday);
            document.getElementById("age").value = age;
        }

        function calculateAgeFromDate(birthDate) {
            var currentDate = new Date();
            var age = currentDate.getFullYear() - birthDate.getFullYear();
            var monthDifference = currentDate.getMonth() - birthDate.getMonth();

            if (monthDifference < 0 || (monthDifference === 0 && currentDate.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        }
    </script>

    <script>
        // Get the current date
        var currentDate = new Date().toISOString().split("T")[0];

        // Set the minimum value of the date input to the current date
        document.getElementById("bday").setAttribute("max", currentDate);
    </script>

    <script>
        function toggleSKLastQuestion() {
            var skVoter = document.querySelector('input[name="skvoter"]:checked').value;
            var skLastQuestion = document.getElementById("sk_last_question");

            if (skVoter === "Yes") {
                skLastQuestion.style.display = "block";
            } else {
                skLastQuestion.style.display = "none";
            }
        }
    </script>

    <script>
        function toggleAssemblyQuestion() {
            var assembly = document.querySelector('input[name="assembly"]:checked').value;
            var assembFirst = document.getElementById('assembly_yes');
            var assembSecond = document.getElementById('assembly_no');


            if (assembly === "Yes") {
                assembFirst.style.display = "block";
                assembSecond.style.display = "none";
            } else {
                assembFirst.style.display = "none";
                assembSecond.style.display = "block";
            }
        }
    </script>
    <!-- .page-section -->

    {{-- <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="../dash/assets/img/mobile_app.png" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="../dash/assets/img/google_play.svg" alt=""></a>
          <a href="#" class="ml-2"><img src="../dash/assets/img/app_store.svg" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home --> --}}

    @include('user.baco.footer')

    <script src="../dash/assets/js/jquery-3.5.1.min.js"></script>

    <script src="../dash/assets/js/bootstrap.bundle.min.js"></script>

    <script src="../dash/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../dash/assets/vendor/wow/wow.min.js"></script>

    <script src="../dash/assets/js/theme.js"></script>

</body>

</html>

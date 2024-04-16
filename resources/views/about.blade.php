<div style="margin: 0 auto; background-image: url('aboutbg6.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 850px; margin-top: -15.5px;">
<div class="container mt-3" style="font-family: 'DM-Sans', sans-serif; margin-left: 1000px; padding-top: 175px; color: white;" id="bout">
    <div class="page-section pb-0" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <div class="text-block">
                        <h2 class="section-heading mb-3" id="d-text">PYDC Youth Profiling</h2>
                        <h5 class="accordion-title" id="d-text">FAQs</h5>
                        <div class="acc-container">
                            <div class="question"> Why does the Provincial Youth Development Council collect data on
                                youths?</div>
                            <div class="answer text-muted">
                                The PYDC collects data on youths to gain a comprehensive understanding of their needs,
                                challenges, and aspirations.
                                This information serves as a valuable resource for developing youth-oriented policies,
                                programs, and initiatives.
                                It helps the council identify areas where interventions are required, allocate resources
                                effectively,
                                and advocate for youth development within the province.
                            </div>
                        </div>
                        <div class="acc-container">
                            <div class="question">What is the rationale behind the establishment of the Provincial Youth
                                Development Council?</div>
                            <div class="answer text-muted">Republic Act (RA) 10742, otherwise known as the "Sangguniang
                                Kabataan (SK) Reform Act 2015",
                                encourages the involvement of the youth in public and civic affairs through the
                                establishment of effective, responsive,
                                and enabling mechanisms in intitutionalizing youth participation in local governance.
                            </div>
                        </div>
                        <div class="acc-container">
                            <div class="question">How does the Republic Act support the objectives of the Provincial
                                Youth Development Council?</div>
                            <div class="answer text-muted">The Republic Act (RA) 10742, provides the legal framework and
                                mandate for the PYDC's
                                existence and operations. It outlines the council's objectives, functions, composition,
                                and responsibilities.
                                The Act emphasizes the promotion of youth welfare, empowerment, and active participation
                                in decision-making processes.
                                It also encourages the establishment of youth-related programs, projects, and services
                                to address their specific needs and
                                contribute to their overall development.
                            </div>
                            </div>
                            </div>
                            </div>
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    //About
    var about = document.querySelector('#about')
    var aboutText = document.querySelectorAll('#d-text')
    var acc = document.querySelectorAll('.acc-container')
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
            this.classList.toggle('active');
        })
    }
    about.addEventListener('mouseover', function() {
        for (i = 0; i < aboutText.length; i++) {
            aboutText[i].setAttribute('class', 'text-block text-info animate__animated animate__flash')
        }

    });
    about.addEventListener('mouseout', function() {
        for (i = 0; i < aboutText.length; i++) {
            aboutText[i].setAttribute('class', 'text-block')
        }
    });
</script>

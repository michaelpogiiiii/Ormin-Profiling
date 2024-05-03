<style>
.carousel {
    width: 500px; /* Change the width to your desired size */

  overflow: hidden;
  position: relative;
  margin: auto; /* Center the carousel horizontally */

}

  .carousel-container {
    display: flex;
    transition: transform 0.5s ease;
  }
  
  .carousel-item {
    min-width: 100%;
    flex: 1;
    width: 1000px;
  }
  
  .carousel-item img {
    width: 500px;
    height: 300px;
    
  }

  .carousel-indicators {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;

  }

  .carousel-indicator {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background-color: #bbb;
    margin: 0 5px;
    cursor: pointer;
  }

  .carousel-indicator.active {
    background-color: #333;
  }

  .carousel-controls {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
  }


 .next{
margin-left: 380px;
width: 40px;
    height: 40px;
    background-color: rgba(14, 175, 81, 0.5);
    color: #fff;
    border: none;
    border-radius: 50%;
    cursor: pointer;
  }
  .prev{
margin-left: 20px;
width: 40px;
    height: 40px;
    background-color: rgba(14, 175, 81, 0.5);
    color: #fff;
    border: none;
    border-radius: 50%;
    cursor: pointer;
  }
  .prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}
</style>
<div style="margin: 0 auto; background-image: url('aboutbgfinal.png'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 680px; margin-top: -17.5px;">
    <div class="container mt-3" style="font-family: 'DM-Sans', sans-serif; padding-top: 100px; color: white;" id="bout">
        <div class="page-section pb-0" id="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <div class="text-block">
                            <h2 class="section-heading mb-3" id="d-text">GO-YDD Youth Profiling</h2>
                            <h5 class="accordion-title" id="d-text">FAQs</h5>
                            <div class="acc-container">
                                <div class="question">Why does the Office of the Governor - Youth Development Division (GO-YDD) collect data on youths?</div>
                                <div class="answer text-muted">The GO-YDD collects data on youths to gain a comprehensive understanding of their needs, challenges, and aspirations. This information serves as a valuable resource for developing youth-oriented policies, programs, and initiatives. It helps the council identify areas where interventions are required, allocate resources effectively, and advocate for youth development within the province.</div>
                            </div>
                            <div class="acc-container">
                                <div class="question">What is the rationale behind the establishment of the Office of the Governor - Youth Development Division (GO-YDD)?</div>
                                <div class="answer text-muted">Republic Act (RA) 10742, otherwise known as the "Sangguniang Kabataan (SK) Reform Act 2015", encourages the involvement of the youth in public and civic affairs through the establishment of effective, responsive, and enabling mechanisms in institutionalizing youth participation in local governance.</div>
                            </div>
                            <div class="acc-container">
                                <div class="question">How does the Republic Act support the objectives of the Office of the Governor - Youth Development Division (GO-YDD)?</div>
                                <div class="answer text-muted">The Republic Act (RA) 10742 provides the legal framework and mandate for the GO-YDD's existence and operations. It outlines the council's objectives, functions, composition, and responsibilities. The Act emphasizes the promotion of youth welfare, empowerment, and active participation in decision-making processes. It also encourages the establishment of youth-related programs, projects, and services to address their specific needs and contribute to their overall development.</div>
                            </div>
                            <div class="carousel">
  <div class="carousel-container">
    <div class="carousel-item">
      <img src="1.jpg" alt="Image 1">
    </div>
    <div class="carousel-item">
      <img src="6.jpg" alt="Image 2">
    </div>
    <div class="carousel-item">
      <img src="5.jpg" alt="Image 3">
    </div>
    <div class="carousel-item">
        <img src="3.jpg" alt="Image 3">
      </div>
      <div class="carousel-item">
        <img src="2.jpg" alt="Image 3">
      </div>
  </div>
  <div class="carousel-indicators">
    <div class="carousel-indicator"></div>
    <div class="carousel-indicator"></div>
    <div class="carousel-indicator"></div>
  </div>
  <div class="carousel-controls">
    <button class=" prev">&#10094;</button>
    <button class=" next">&#10095;</button>
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
    document.addEventListener('DOMContentLoaded', function() {
        var accContainers = document.querySelectorAll('.acc-container');

        accContainers.forEach(function(container) {
            container.addEventListener('click', function() {
                if (this.classList.contains('active')) {
                    this.classList.remove('active');
                } else {
                    accContainers.forEach(function(otherContainer) {
                        otherContainer.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });

        var aboutText = document.querySelectorAll('#d-text');
        var about = document.querySelector('#about');

        about.addEventListener('mouseover', function() {
            aboutText.forEach(function(text) {
                text.classList.add('text-info', 'animate__animated', 'animate__flash');
            });
        });

        about.addEventListener('mouseout', function() {
            aboutText.forEach(function(text) {
                text.classList.remove('text-info', 'animate__animated', 'animate__flash');
            });
        });
    });
  const carousel = document.querySelector('.carousel');
  const container = carousel.querySelector('.carousel-container');
  const items = carousel.querySelectorAll('.carousel-item');
  const totalItems = items.length;
  const indicators = carousel.querySelectorAll('.carousel-indicator');
  const prevButton = carousel.querySelector('.prev');
  const nextButton = carousel.querySelector('.next');
  let currentIndex = 0;
  let timer;

  function slideTo(index) {
    currentIndex = index;
    const offset = -currentIndex * 100 + '%';
    container.style.transform = `translateX(${offset})`;
    updateIndicators();
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    slideTo(currentIndex);
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    slideTo(currentIndex);
  }

  function startSlideShow() {
    timer = setInterval(nextSlide, 2500); // Change image every 2.5 seconds
  }

  function stopSlideShow() {
    clearInterval(timer);
  }

  function updateIndicators() {
    indicators.forEach((indicator, index) => {
      if (index === currentIndex) {
        indicator.classList.add('active');
      } else {
        indicator.classList.remove('active');
      }
    });
  }

  function addIndicatorClickEvent() {
    indicators.forEach((indicator, index) => {
      indicator.addEventListener('click', () => {
        slideTo(index);
      });
    });
  }

  function addControlClickEvent() {
    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);
  }

  addIndicatorClickEvent();
  addControlClickEvent();
  startSlideShow();


</script>

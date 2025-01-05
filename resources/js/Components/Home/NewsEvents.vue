<template>
  <section class="news-events">
    <h2>News & Events</h2>
    <div class="content">
      <div class="carousel">
        <div class="slider-wrapper">
          <!-- Radio Inputs for each slide -->
          <input type="radio" name="slider" id="slide1" checked />
          <input type="radio" name="slider" id="slide2" />
          <input type="radio" name="slider" id="slide3" />

          <!-- Slides -->
          <div class="slides">
            <!-- Slide 1 -->
            <div class="slide">
              <img src="@/assets/images/NEWS.png" alt="News Image 1" />
            </div>
            <!-- Slide 2 -->
            <div class="slide">
              <img src="@/assets/images/NEWS (2).png" alt="News Image 2" />
            </div>
            <!-- Slide 3 -->
            <div class="slide">
              <img src="@/assets/images/RAILWAY.png" alt="News Image 3" />
            </div>
          </div>

          <!-- Navigation Dots -->
          <div class="dots">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
          </div>
        </div>
      </div>

      <!-- News Updates -->
      <div class="news-updates">
        <h3>Exciting News and Events at Railway XYZ</h3>
        <p>Stay up to date with the latest news and events at Railway XYZ. Discover important updates, announcements,
          and upcoming happenings that matter to you.</p>
      </div>
    </div>
  </section>
</template>

<script setup>
</script>

<style scoped>
.news-events {
  padding: 20px;
  display: flex;
  flex-direction: column;
  gap: 20px;
  text-align: center;
}

.news-events .content {
  display: flex;
  flex-direction: row;
  gap: 20px;
  justify-content: center;
  width: 100%;
  /* Ensure it takes full width */
}

.carousel,
.news-updates {
  flex: 1;
  /* Each will take 50% of the width */
  width: 50%;
}

.carousel {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.slider-wrapper {
  position: relative;
  width: 100%;
}

.slides {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.slide {
  min-width: 100%;
  height: 300px;
  /* Adjust the height of each slide */
  background-color: #ddd;
}

.slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Hide radio buttons */
input[type="radio"] {
  display: none;
}

/* Navigation dots */
.dots {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 5px;
}

.dots label {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #fff;
  cursor: pointer;
}

input#slide1:checked~.slides {
  transform: translateX(0%);
}

input#slide2:checked~.slides {
  transform: translateX(-100%);
}

input#slide3:checked~.slides {
  transform: translateX(-200%);
}

/* Highlight active dot */
input#slide1:checked~.dots label:nth-child(1),
input#slide2:checked~.dots label:nth-child(2),
input#slide3:checked~.dots label:nth-child(3) {
  background-color: #0073e6;
}

.news-updates {
  text-align: left;
  padding: 10px;
}

.news-updates h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.news-updates p {
  font-size: 1rem;
}

@media screen and (max-width: 768px) {
  .news-events .content {
    flex-direction: column;
  }

  .news-updates {
    width: 100%;
    padding: 0;
    text-align: justify;
  }
}
</style>

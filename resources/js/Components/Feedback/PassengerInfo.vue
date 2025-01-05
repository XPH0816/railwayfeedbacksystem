<script setup>
const props = defineProps({
  title: String,
});
</script>

<template>
  <div class="feedback-container">
    <!-- Introduction Section -->
    <div class="intro">
      <h2>Welcome to Railway Service Feedback</h2>
      <p>
        Please provide your feedback on the railway services you have experienced. Your input helps us improve the
        quality and efficiency of the services we offer.
      </p>
    </div>
  </div>
</template>

<style scoped>
/* Container */
.feedback-container {
  display: flex;
  flex-direction: column;
  /* Space between elements */
  justify-content: space-between;
}

/* Introduction Section with Background Image */
.intro {
  padding: 30px;
  margin: auto;
  /* flex: 1; */
  background-image: url('@/assets/images/FEEDBACK.png');
  background-color: rgba(0, 0, 0, 0.6);
  background-blend-mode: overlay;
  background-size: cover;
  background-position: center;
  color: white;
  border-radius: 5px;
}

/* Form Section */
.form-section {
  min-width: 300px;
  padding: 40px;
  margin: auto;
}

.form-section h1 {
  text-align: center;
  color: #0073e6;
}

fieldset {
  border: none;
}

.button-primary {
  width: 100%;
  padding: 10px;
  background-color: #0073e6;
  color: white;
  border: 1px solid #005bb5;
  border-radius: 5px;
  font-size: 1rem;
}

.button.button-primary {
  background-color: #005bb5;
}

@media screen and (max-width: 768px) {
  .feedback-container {
    flex-direction: column;
    align-items: center;
    gap: 0;
  }

  .intro,
  .form-section {
    width: 100%;
  }

  .intro {
    padding-left: 0%;
    padding-right: 0%;
  }

  .form-section {
    padding: 0px;
  }

  h2 {
    font-size: 1.2em;
  }

  p {
    font-size: 0.9em;
  }
}
</style>

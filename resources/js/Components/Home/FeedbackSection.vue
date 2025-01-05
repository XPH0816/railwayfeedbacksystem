<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="feedback-component">
    <!-- Title, Description, Link -->
    <div class="left-side">
      <h2>Give Us Your Feedback!</h2>
      <p>We value your feedback to improve our services. Please let us know how we can serve you better.</p>
      <Link :href="route('feedback')" class="feedback-link">We Hear You</Link>
    </div>

    <!-- Right Side: Image -->
    <div class="right-side">
      <img src="@/assets/images/FEEDBACK.png" alt="Feedback Illustration" />
    </div>
  </div>
</template>

<style scoped>
.feedback-component {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background-color: #f4f4f4;
}

.left-side {
  flex: 1;
  max-width: 50%;
}

.right-side {
  flex: 1;
  max-width: 50%;
  text-align: center;
}

.right-side img {
  width: 100%;
  max-width: 400px;
  height: auto;
}

.feedback-link {
  display: inline-block;
  margin-top: 10px;
  padding: 8px 12px;
  background-color: #0073e6;
  color: white;
  font-size: 18px;
  text-decoration: none;
  border-radius: 4px;
}

.feedback-link:hover {
  background-color: #005bb5;
}

@media screen and (max-width: 768px) {
  .feedback-component {
    flex-direction: column-reverse;
  }

  .left-side,
  .right-side {
    max-width: 100%;
  }

  .right-side img {
    margin-top: 20px;
  }

}
</style>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
  <section class="register">
    <h2>Register Now</h2>
    <div class="content">
      <!--REGISTER IMAGE-->
      <div class="register-img">
        <img src="@/assets/images/REGISTER.png" alt="News Image 1" />
      </div>
      <!-- Welcome Message -->
      <div class="form">
        <h3>You are one step away from joining us!</h3>
        <!-- Feedback Message -->
        <p>Sign up now to provide your valuable feedback on our railway system. </p>
        <div class="buttons">
          <Link class="btn btn-signup" :href="route('register')">Sign Up</Link>
          <Link class="btn btn-signin" :href="route('login')">Sign In</Link>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.register {
  padding: 30px;
  background-color: #f9f9f9;
  text-align: center;
  margin: 20px 0;
}

.register h2 {
  margin-bottom: 30px;
}

img {
  border-radius: 10px;
}

.content {
  display: flex;
  flex-direction: row;
  gap: 1em;
  width: 100%;
  justify-content: auto;

}

.register-img,
.form {
  flex: 1;
  width: 50%;
  /* Adjust width to distribute space evenly */
}

.register-img img {
  max-width: 400px;
  width: 100%;
  display: block;
  margin: 0 auto;
  justify-items: auto;
}

.form {
  text-align: justify;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 10px;
  max-width: 50%;
}

.form h3 {
  margin-bottom: 0px;
}

.form input {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.buttons {
  display: flex;
  gap: 2.8em;
}

.btn {
  all: unset;
  padding: .5em 1em;
  border: none;
  border-radius: 4px;
  font-size: 1.4em;
  cursor: pointer;
  text-align: center;
  width: 45%;
}

.btn-signup {
  background-color: #007bff;
  color: white;
}

.btn-signin {
  background-color: #6c757d;
  color: white;
}

@media screen and (max-width: 768px) {
  .content {
    flex-direction: column;
    align-items: center;
  }

  .register-img,
  .form {
    width: 100%;
  }

  .form {
    margin: 0;
    max-width: 85%;
    display: flex;
    flex-direction: column;
  }

  h3,
  p {
    text-align: justify;
  }

  .btn {
    padding: 10px 16px;
    border-radius: 4px;
    font-size: 16px;
  }

  .buttons {
    gap: 0;
    justify-content: space-between;
  }
}
</style>

<script setup>
const props = defineProps(['title', 'readonly', 'required']);

const model = defineModel();
</script>
<template>
  <div class="input-container">
    <input type="text" id="input" v-model="model" :readonly="props.readonly" :required="props.required" />
    <label for="input" class="label">{{ props.title }}</label>
    <div class="underline"></div>
  </div>
</template>

<style scoped>
/* From Uiverse.io by Satwinder04 */
.input-container {
  position: relative;
  margin: 5px auto;
  width: 100%;
}

.input-container input[type="text"] {
  font-size: 20px;
  width: 100%;
  border: none;
  border-bottom: 2px solid #ccc;
  padding: 2px 0;
  background-color: transparent;
  outline: none;
}

.input-container .label {
  position: absolute;
  top: 0;
  left: 0;
  color: #ccc;
  transition: all 0.3s ease;
  pointer-events: none;
}

.input-container input[type="text"]:focus~.label,
.input-container input[type="text"]:valid~.label {
  top: -20px;
  font-size: 16px;
  color: #333;
}

.input-container .underline {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 2px;
  width: 100%;
  background-color: #333;
  transform: scaleX(0);
  transition: all 0.3s ease;
}

.input-container input[type="text"]:focus~.underline,
.input-container input[type="text"]:valid~.underline {
  transform: scaleX(1);
}
.input-container input[type="text"][readonly]~.label {
    top: -20px;
    font-size: 16px;
    color: #333;
}
</style>

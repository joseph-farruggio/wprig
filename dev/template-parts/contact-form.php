<?php 
/**
 * Contact Form
 * 
**/
?>

<p v-if="errors.length" v-cloack>
  <b>Please correct the following error(s):</b>
  <ul>
    <li v-for="error in errors">{{ error }}</li>
  </ul>
</p>

<form @submit.prevent="submitForm" method="post">
  <div class="half-col">
      <label> Your Name (required)
        <input type="text" v-model="name" name="name" required>
      </label>

      <label> Your Email (required)
        <input type="email" v-model="email" name="email" required>
      </label>  
  </div>

  <label> Your Website (required)
    <input type="url" v-model="website" name="website" required>
  </label>  

  <label> Subject
    <input type="text" v-model="subject" name="subject">
  </label>  

  <label> Your Message
    <textarea rows="2" v-model="message" name="message"></textarea>
  </label>
  
  <br>
  
  <div class="formSubmitContainer">
    <button 
      class="btn btn-primary btn-large"
      type="submit">Submit</button>

    <i
      v-cloak
      v-if="formLoader" 
      class="fas fa-spinner fa-spin formLoader"></i>
  </div>

  <br>
  <div v-cloak v-if="formSent" class="alert success">
    <p>Your message has been sent.</p>
  </div>
  
    
</form>
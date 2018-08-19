<?php 
/**
 * Contact Form
 * 
**/
?>

<p v-if="form.errors.length" v-cloack>
  <b>Please correct the following error(s):</b>
  <ul>
    <li v-for="error in form.errors">{{ error }}</li>
  </ul>
</p>

<form @submit.prevent="submitForm" method="post" action="">
  <div class="half-col">
      <label> Your Name (required)
        <input type="text" v-model="form.name" name="name" required>
      </label>

      <label> Your Email (required)
        <input type="email" v-model="form.email" name="email" required>
      </label>  
  </div>

  <label> Your Website (required)
    <input type="url" v-model="form.website" name="website" required>
  </label>  

  <label> Subject
    <input type="text" v-model="form.subject" name="subject" required>
  </label>  

  <label> Your Message
    <textarea rows="2" v-model="form.message" name="message" required></textarea>
  </label>
  
  <?php wp_nonce_field( 'name_of_my_action', 'name_of_nonce_field' ); ?>
  <br>
  
  <div class="formSubmitContainer">
    <button 
      class="btn btn-primary btn-large"
      type="submit">Submit</button>

    <i
      v-cloak
      v-if="form.formLoader" 
      class="fas fa-spinner fa-spin formLoader"></i>
  </div>

  <br>
  <div v-cloak v-if="form.formSent" class="alert success">
    <p>Your message has been sent.</p>
  </div>
  
    
</form>
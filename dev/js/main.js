const ajaxURL = WPURLS.ajax_url;
const templateDirectory = WPURLS.templateDirectory;
const siteURL = WPURLS.site_url;

Vue.component('menu-item', {
  props: [
    'url',
    'post_parent',
    'title',
    'object_id',
    'active'
  ],
  template: `
    <li>
      <slot></slot>
    </li>
  `
})

Vue.component('sub-menu-item', {
  props: [
    'url',
    'post_parent',
    'title',
    'object_id',
    'active'
  ],
  template: `
    <li>
      <a :href="url">{{ title }}</a>
    </li>
  `
})

new Vue({
  el: '#page',
  data() {
    return {
      ajaxURL: ajaxURL,
      siteURL: siteURL,
      templateDirectory: templateDirectory,
      navOpen: false,
      subMenuOpen: false,
      modalShow: false,
      navItems: [],
      form: {
        id: '',
        action: '',
        formLoader: false,
        formSent: false,
        name: '',
        email: '',
        website: '',
        subject: '',
        message: '',
        response: '',
        errors: '',
      }
    }
  },
  computed: {
  },
  created() {
		axios.get('https://api.myjson.com/bins/7sgjw')
    .then(response => {
      this.navItems = response.data
      for (let i = 0; i < this.navItems.length; i++) {
        // this.navItems[i]['active'] = false
        this.$set(this.navItems[i], 'active', true)
      }		
      // this.navItems = response.data.map(item => {
			// 	return { 
			// 	  ...item, 
			// 		active: false 
			// 	}
			// })
		})
	},
  methods: {
    submitForm:function () {
      this.formLoader = true
      var data = {
        name: this.form.name,
        email: this.form.email,
        website: this.form.website,
        subject: this.form.subject,
        message: this.form.message
      }
      axios.post(this.templateDirectory+'/inc/mail/mail_handler.php', Qs.stringify( data ))
      .then(response => {
        this.form.formLoader = false
        this.form.formSent = true
        this.response = JSON.stringify(response, null, 2)
      })
    }
  }
})
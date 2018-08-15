const templateDirectory = WPURLS.templateDirectory;
const site_url = WPURLS.site_url;

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
      site_url: site_url,
      templateDirectory: templateDirectory,
      formLoader: false,
      formSent: false,
      name: '',
      email: '',
      website: '',
      subject: '',
      message: '',
      response: '',
      errors: '',
      navOpen: false,
      subMenuOpen: false,
      modalShow: false,
      navItems: [],
    }
  },
  computed: {
  },
  created() {
		axios.get('https://api.myjson.com/bins/7sgjw')
    .then(response => {
			this.navItems = response.data;
			for (let i = 0; i < this.navItems.length; i++) {
        this.$set(this.navItems[i], 'active', false)
		  }
		})

	},
  methods: {
    submitForm:function () {
      this.formLoader = true
      var data = {
        action: this.action,
        name: this.name,
        email: this.email,
        website: this.website,
        subject: this.subject,
        message: this.message
      }
      axios.post(this.templateDirectory+'/inc/form-handler.php', Qs.stringify( data ))
      .then(response => {
        this.formLoader = false
        this.formSent = true
        this.response = JSON.stringify(response, null, 2)
        console.log('form response')
      })
      console.log('form submitted')
    }
  }
})
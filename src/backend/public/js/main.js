const { createApp } = Vue
      
createApp({
    delimiters: ['${', '}'], 
    components: {
        VForm: VeeValidate.Form,
        VField: VeeValidate.Field,
        ErrorMessage: VeeValidate.ErrorMessage,
      },   
    data() {
        return {
            comments: [],
        }
    },
    mounted() {
        this.getList()
    },
    methods: {
        getList() {
            axios.get('http://localhost/comments')
              .then((response) => {
                  this.comments = response.data
              })
        },
        submitForm(values) {
            var formData = new FormData();
            for ( var key in values ) {
                formData.append(key, values[key]);
            }
            console.log(formData);
            const headers = {
                'Content-Type': 'multipart/form-data',
            }
            axios.post('http://localhost/comments', formData, {headers:headers})
            .then((response) => {
                this.getList()
            })
        },
        isRequired(value) {
            if (!value) {
                return 'This field is required';
            }
            return true;
        },
        validateEmail(value) {
            if (!value) {
              return 'This field is required';
            }
            const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (!regex.test(value)) {
              return 'This field must be a valid email';
            }
            return true;
        },
    },
}).mount('#app')


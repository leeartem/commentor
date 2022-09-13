const { createApp } = Vue
      
createApp({
    delimiters: ['${', '}'], 
    components: {
        // Components were renamed to avoid conflicts of HTML form element without a vue compiler
        VForm: VeeValidate.Form,
        VField: VeeValidate.Field,
        ErrorMessage: VeeValidate.ErrorMessage,
      },   
    data() {
        return {
            comments: [],
            comment: {
                name: 'Tyoma Tema',
                email: 'hello@ya.ru',
                title: 'Cool title 2',
                text: 'Super mega comment',
            },
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
            let comment = JSON.stringify(values, null ,2)
            const headers = {
                'Content-Type': 'multipart/form-data',
            }
            axios.post('http://localhost/comments', comment, {headers:headers})
            .then((response) => {
                console.log(comment);
                this.getList()
            })
        },
        isRequired(value) {
            if (!value) {
                return 'this field is required';
            }
            
            return true;
        },
        validateEmail(value) {
            // if the field is empty
            if (!value) {
              return 'This field is required';
            }
            // if the field is not a valid email
            const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (!regex.test(value)) {
              return 'This field must be a valid email';
            }
            // All is good
            return true;
        },
        // onSubmit(values) {
        //     alert();
        // },
    },
}).mount('#app')


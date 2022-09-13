<template>
    <form v-on:submit.prevent="submitForm" class="mb-5">
        <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="" v-model="comment.name" required>
        </div>
        </div>

        <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="email" placeholder="" v-model="comment.email" required>
        </div>
        </div>

        <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input class="input" type="text" placeholder="" v-model="comment.title" required>
        </div>
        </div>

        <div class="field">
        <label class="label">Message</label>
        <div class="control">
            <textarea class="textarea" placeholder="" name="text" required>{{comment.text}}</textarea>
        </div>
        </div>

        <div class="field is-grouped">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
        </div>
    </form>
</template>

<script>
    export default {
      name: 'Form',
      data: () => ({
        comment: {
            name: 'Tyoma Tema',
            email: 'hello@ya.ru',
            title: 'Cool title',
            text: 'Super mega comment',
        },
        }),
      methods: {
        submitForm() {
            console.log(this.comment);
            this.axios.post('http://127.0.0.1:8080/comments', this.comment)
            .then((response) => {
                console.log(response.data)
            })
        }
      },
      mounted() {
      },
    }
    </script>
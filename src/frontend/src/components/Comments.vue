<template>
    <h2 class="title mt-5 mb-3">Comments</h2>
    <form v-on:submit.prevent="submitForm" class="mb-5">
        <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="" v-model="comment.name">
        </div>
        </div>

        <div class="field">
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="email" placeholder="" v-model="comment.email">
        </div>
        </div>

        <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input class="input" type="text" placeholder="" v-model="comment.title">
        </div>
        </div>

        <div class="field">
        <label class="label">Message</label>
        <div class="control">
            <textarea class="textarea" placeholder="" name="text">{{comment.text}}</textarea>
        </div>
        </div>

        <div class="field is-grouped">
        <div class="control">
            <button class="button is-link">Submit</button>
        </div>
        </div>
    </form>
    <div class="comments-list">
        <div class="comment" v-for="comment in comments" :key="comment.id">
            <div class="comment-body">
                <p class="comment-title">{{comment.title}}</p>
                <p class="comment-text">{{comment.text}}</p>
            </div>
            <div class="comment-meta">
                <p class="comment-author">
                    {{comment.name}} • {{comment.email}}
                </p>
                <p class="comment-date">
                    {{comment.created_at}}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Comments',
  data: () => ({
    comments: [],
    comment: {
        name: 'Tyoma Tema',
        email: 'hello@ya.ru',
        title: 'Cool title 2',
        text: 'Super mega comment',
    },
    // comment: {
    //     name: '',
    //     email: '',
    //     title: '',
    //     text: '',
    // },
    }),
  methods: {
    getList() {
      this.axios.get('http://127.0.0.1/comments')
        .then((response) => {
            this.comments = response.data
            console.log(response.data)
        })
    },
    submitForm() {
        const headers = {
            // 'Access-Control-Allow-Origin': '*',
            // 'Content-Type': 'application/json',
            // 'Content-Type': 'multipart/form-data',
            // 'Content-Type': 'application/x-www-form-urlencoded',
        }
        console.log(this.comment);
        this.axios.post('http://127.0.0.1/comments', this.comment, {headers:headers})
        .then((response) => {
            console.log(response.data)
            this.getList()
        })
    }
  },
  mounted() {
    this.getList()
  },
}
</script>
<template>
    <div class="row py-4">
        <div class="col-4 mb-4" v-for="post in posts" :key="post.slug">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text text-truncate">{{ post.content }}</p>
                    <router-link
                        :to="{ name: 'post', params: { slug: post.slug } }"
                        class="btn btn-primary"
                    >
                        Read this post
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomePage",
    components: {},
    data() {
        return {
            posts: null
        }
    },
    created() {
        axios.get('/api/posts').then(response => this.posts = response.data)
    }
};
</script>

<template>
    <div class="row justify-content-center py-4">
        <div class="col">
            <div v-if="category" class="card">
                <div class="card-header d-inline-flex flex-column">
                    <span class="font-weight-bold" style="font-size: 1.5rem">{{
                        category.name
                    }}</span>
                </div>

                <div class="card-body">
                    <ul v-if="category.posts && category.posts.length > 0">
                        <li v-for="post in category.posts" :key="post.slug">
                            <router-link
                                :to="{
                                    name: 'post',
                                    params: { slug: post.slug },
                                }"
                            >
                                {{ post.title }}
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CategoryPage",
    components: {},
    data() {
        return {
            category: null,
        };
    },
    created() {
        axios
            .get(`/api/categories/${this.$route.params.slug}`)
            .then((response) => {
                console.log(response);
                this.category = response.data;
            });
    },
};
</script>

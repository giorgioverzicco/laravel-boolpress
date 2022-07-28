<template>
    <div class="row py-4">
        <div
            class="col-4 mb-4"
            v-for="category in categories"
            :key="category.slug"
        >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ category.name }}</h5>
                    <p v-if="category.posts" class="card-text">
                        N. of posts: {{ category.posts.length }}
                    </p>
                    <router-link
                        :to="{
                            name: 'category',
                            params: { slug: category.slug },
                        }"
                        class="btn btn-primary"
                    >
                        Visit this category
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
            categories: null,
        };
    },
    created() {
        axios
            .get("/api/categories")
            .then((response) => (this.categories = response.data));
    },
};
</script>

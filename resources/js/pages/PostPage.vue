<template>
    <div class="row justify-content-center py-4">
        <div class="col">
            <div v-if="post" class="card">
                <div class="card-header d-inline-flex flex-column">
                    <span class="font-weight-bold" style="font-size: 1.5rem">{{
                        post.title
                    }}</span>
                    <div v-if="post.category">
                        <span class="badge badge-primary">{{
                            post.category.name
                        }}</span>
                    </div>
                    <div
                        class="d-inline-flex mt-1"
                        v-if="post.tags && post.tags.length > 0"
                    >
                        <span
                            v-for="tag in post.tags"
                            :key="tag.slug"
                            class="badge badge-secondary mr-1"
                            >#{{ tag.name }}</span
                        >
                    </div>
                </div>

                <div class="card-body">
                    {{ post.content }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostPage",
    components: {},
    data() {
        return {
            post: null,
        };
    },
    created() {
        axios.get(`/api/posts/${this.$route.params.slug}`).then((response) => {
            console.log(response);
            this.post = response.data;
        });
    },
};
</script>

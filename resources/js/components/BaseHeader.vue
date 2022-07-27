<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" :class="this.$route.name === 'home' ? 'active' : ''">
                        <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item" :class="this.$route.name === 'about' ? 'active' : ''">
                        <router-link :to="{ name: 'about' }" class="nav-link">About Us</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/home">Dashboard</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: "BaseHeader",
    components: {},
};
</script>

<template>
    <div>
        <BaseHeader />
        <BaseMain />
    </div>
</template>

<script>
import BaseHeader from "../components/BaseHeader";
import BaseMain from "../components/BaseMain";
export default {
    name: "App",
    components: {BaseMain, BaseHeader},
};
</script>

<style></style>

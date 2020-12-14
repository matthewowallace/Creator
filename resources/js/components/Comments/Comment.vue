<template>
    <div>
        <p>{{comment}}</p>
    </div>
</template>
<script>
export default {
    props: ['comment']
}
</script>

<style scoped>

    p{
        padding-left:10px;
        padding-bottom: 3px;
    }

</style>

<template>
    <div>
        <h1>the number is : {{views}} </h1>
        <button @click="updateCounter(1)">Increase</button>
        <button @click="updateCounter(1)">Decrease</button>
        <br>
        <br>

        <div v-for="(blog, i) in blogs" :key="i" v-if="blogs.length">
            <h1>{{blog.title}}</h1>
             <h1>{{blog.post}}</h1>
        </div>

        <br>
        <br>

        <div>
            <h1 v-if="showItem">show this item if "showOtem" is true</h1>
            <p v-else>show this true item if "showItem" is false </p>
        </div>

        <button @click="showItem = !showItem">Change showItem</button>

    </div>
</template>

<script>
export default {
    data(){
        return{
            views: 0,
            blogs: [],
            showItem : false
        }
    },

    methods: {
        updateCounter(number){
            this.views += number
        },
        changeShowItem(){
            this.showItem = !this.showItem
        }
    },

    created(){
        // can call server to get views
        this.views = 100
        // get the blog posts
        let posts = [{title: 'Create', 'post': 'i love to create 1', id: 1},]

        this.blogs = posts
    },

}
</script>

<style>

</style>

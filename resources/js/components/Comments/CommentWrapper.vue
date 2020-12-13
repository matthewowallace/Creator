<template>
    <div>
        <CommentAdd />
        <!-- <Comment /> -->
        <div v-for="comment in comments" v-bind:key="comment.id">
            <Comment :comment="comment" />
        </div>
    </div>
</template>
<script>
import Comment from './Comment';
import CommentAdd from './CommentAdd';
export default {

    components:{
        CommentAdd,
        Comment,
    },

    data(){
        return{
            comments: []
        }
    }



}
</script>
<style scoped>



</style>

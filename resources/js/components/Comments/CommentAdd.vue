<template>
    <div>
          <button @click="addcommentmodal = true" class="addtag-btn">Add Comment</button>
         <Modal
            v-model="addcommentmodal"
            title="Add New Comment"
            :mask-closable="false"
            :closable="false"
        >
            <Input v-model="comment" placeholder="Enter Comment" />
            <div slot="footer">
                <button @click="addcommentmodal = false">Close</button>
                <button
                    class="add-btn"
                    @click="addComment"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Add Comment" }}
                </button>
            </div>
        </Modal>
    </div>
</template>
<script>
export default {

    data(){
        return{
              addcommentmodal: false,
              isAdding: false,
              comment: '',


        }
    },

    methods: {
        async addComment(){

            if (this.comment.trim() == "")
            return this.error("Comment is required");

            const data = {
                body: this.comment,
                post_id: this.$route.params.id
            }

            const res = await this.callApi("post", "api/comment", this.data);
            if (res.status === 201) {
                this.comment.unshift(res.data);
                this.success("Comment has been added successfully!");
                this.addcommentmodal = false;
                this.comment = "";
            } else {
                if (res.status == 422) {
                    if (res.data.errors.comment) {
                        this.error(res.data.errors.comment[0]);
                    }
                } else {
                    this.swr();
                }
            }
        }

    },

    async created() {
        const res = await this.callApi("get", "api/post/comments");
        if (res.status == 200) {
            this.comments = res.data;
        } else {
            this.something();
        }
    }



}
</script>
<style scoped>

    .addtag-btn {
        background-color: #2d8cf0;
        margin-bottom: 10px;
        padding: 12px 28px;
        font-size: 11px;
        color: #fff;
        text-transform: uppercase;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
            0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

</style>

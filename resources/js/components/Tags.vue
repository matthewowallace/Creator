<template>
    <div class="tagtable">
        <button @click="addtagmodal = true" class="addtag-btn">Add Tag</button>
        <!-- <Table border :columns="tags" :data="tags"></Table> -->
        <!-- Tag adding modal   -->

        <table class="tag-table">
            <tr class="header">
                <th>#</th>
                <th>ID</th>
                <th>TagName</th>
                <th>Action</th>
            </tr>

            <tr v-for="(tag, i) in tags" :key="i" v-if="tags.length">
                <td><input type="checkbox" /></td>
                <td>
                    <Tag>{{ tag.id }}</Tag>
                </td>
                <td>
                    <Tag type="dot" color="primary">{{ tag.tagName }}</Tag>
                </td>
                <td>
                    <div>
                        <button>
                            <Icon
                                type="md-create"
                                size="22"
                                @click="showEditModal(tag, i)"
                            />
                        </button>
                        <button>
                            <Icon
                                type="ios-trash-outline"
                                :loading="tag.isDelecting"
                                @click="showDeleteModal(tag, i)"
                                size="22"
                            />
                        </button>
                    </div>
                </td>
            </tr>
        </table>

        <Modal
            v-model="addtagmodal"
            title="Add New Tag"
            :mask-closable="false"
            :closable="false"
        >
            <Input v-model="data.tagName" placeholder="Enter Tag Name" />
            <div slot="footer">
                <button @click="addtagmodal = false">Close</button>
                <button
                    class="add-btn"
                    @click="addTag"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Add Tag" }}
                </button>
            </div>
        </Modal>
        <!-- EditModal -->
        <Modal
            v-model="editModal"
            title="Edit Tag"
            :mask-closable="false"
            :closable="false"
        >
            <Input v-model="editData.tagName" placeholder="Edit Tag Name" />
            <div slot="footer">
                <button @click="editModal = false">Close</button>
                <button
                    @click="editTag"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Add Tag" }}
                </button>
            </div>
        </Modal>
        <!-- DeleteModal -->

        <Modal v-model="DeleteModal" width="360">
            <p slot="header" style="color: #f60; text-align: center">
                <Icon type="ios-information-circle"></Icon>
                <span>Delete confirmation?</span>
            </p>
            <div style="text-align: center">
                <p>Deleting removes data from database.</p>
            </div>
            <div slot="footer">
                <Button
                    class="red"
                    type="default"
                    size="large"
                    long
                    :loading="isDeleting"
                    :disabled="isDeleting"
                    @click="deleteTag"
                    >Delete</Button
                >
                <Button type="default" size="large" long @click="closeModal"
                    >Close</Button
                >
            </div>
        </Modal>
    </div>
</template>
<script>
import axios from "axios";
import { mapGetters } from "vuex";
export default {
    components: {

    },

    data() {
        return {
            data: {
                tagName: ""
            },
            addtagmodal: false,
            editModal: false,
            isAdding: false,
            tags: [],
            editData: {
                tagName: ""
            },
            index: -1,
            DeleteModal: false,
            isDeleting: false,
            deleteItem: {},
            deletingIndex: -1
        };
    },
    methods: {
        async addTag() {
            if (this.data.tagName.trim() == "")
                return this.error("Tag name is required");
            const res = await this.callApi("post", "app/create_tag", this.data);
            if (res.status === 201) {
                this.tags.unshift(res.data);
                this.success("Tag has been added successfully!");
                this.addtagmodal = false;
                this.data.tagName = "";
            } else {
                if (res.status == 422) {
                    if (res.data.errors.tagName) {
                        this.error(res.data.errors.tagName[0]);
                    }
                } else {
                    this.swr();
                }
            }
        },

        async editTag() {
            if (this.editData.tagName.trim() == "")
                return this.error("Tag name is required");
            const res = await this.callApi(
                "post",
                "app/edit_tag",
                this.editData
            );
            if (res.status === 200) {
                this.tags[this.index].tagName = this.editData.tagName;
                this.success("Tag has been edited successfully!");
                this.editModal = false;
            } else {
                if (res.status == 422) {
                    if (res.data.errors.tagName) {
                        this.error(res.data.errors.tagName[0]);
                    }
                } else {
                    this.swr();
                }
            }
        },
        showEditModal(tag, index) {
            let obj = {
                id: tag.id,
                tagName: tag.tagName
            };
            this.editData = obj;
            this.editModal = true;
            this.index = index;
        },

        async deleteTag(tag, i) {
            const res = await this.callApi(
                "post",
                "app/delete_tag",
                this.deleteItem
            );
            if (res.status === 200) {
                this.tags.splice(this.deletingIndex, 1);
                this.success("Tag deleted successfully");
            } else {
                this.swr();
            }
            this.isDeleting = false;
            this.DeleteModal = false;
        },

        // loadTags: function(){
        //     // load API
        //     //assign this categories
        //     // catch errors

        //     axios.get('/tags')
        //     .then((response)=>{
        //         this.tags = response.data.data;
        //     })
        //     .catch(function (error){
        //         console.log(error);
        //     });
        // },

        showDeleteModal(tag, i) {
            this.deleteItem = tag;
            this.deletingIndex = i;
            this.DeleteModal = true;
        },

        closeModal() {
            this.DeleteModal = false;
        }
    },

    mounted() {
        // this.loadTags();
    },

    async created() {
        const res = await this.callApi("get", "app/get_tags");
        if (res.status == 200) {
            this.tags = res.data;
        } else {
            this.something();
        }
    }
};
</script>
<style scoped>
.tagtable {
    padding: 80px;
}

th {
    padding: 10px 20px;
    text-align: left;
    font-size: 14px;
    font-weight: bold;
    font-family: "Poppins", sans-serif;
}

td {
    padding: 10px 20px;
    text-align: left;
    font-family: "Poppins", sans-serif;
    border: 1px solid rgb(201, 201, 201);
}

button {
    box-shadow: none;
    padding: 10px 20px;
    border: none;
    background-color: transparent;
}

button:focus {
    outline: none;
}

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

button:hover {
    background-color: #92d4f5;
}

table {
    width: 100%;
}

tr:hover {
    background-color: #a8def8;
}

.header {
    /* background-color:#fff; */
    color: #515a6e;
    box-shadow: none;
}

.header:hover {
    background-color: transparent;
    color: #303030;
    box-shadow: none;
    border: none;
}

tr:nth-child(even) {
    background-color: #f8f8f9;
    box-shadow: none;
}

tr:nth-child(even):hover {
    background-color: #a8def8;
}

.ivu-modal-footer button + button {
    margin-left: 0px !important;
    margin-bottom: 0;
}

.red {
    color: rgb(240, 56, 56);
    font-weight: bold !important;
}

.add-btn {
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

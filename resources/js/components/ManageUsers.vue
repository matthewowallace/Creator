<template>
    <div class="tagtable">
          <!-- <button @click="addtagmodal=true" class="addtag-btn">Add Tag</button> -->
          <!-- <Table border :columns="datatags" :data="datatags"></Table> -->
          <!-- Tag adding modal   -->


            <table class="tag-table">
            <tr class="header">
                <th><input type="checkbox"/></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

                <tr v-for="user in users" :key="user.id">
                    <td><input type="checkbox"/></td>
                    <td>{{user.fullname}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.userType}}</td>
                    <td>
                        <div>
                            <router-link :to="`/users/${user.id}/change-permissions`"><Icon type="md-create" size="22" @click="showEditModal(tag)"/></router-link>
                            <button><Icon type="ios-trash-outline" size="22"/></button>
                        </div>
                    </td>
                </tr>

            </table>
            <!-- <Modal
                v-model="addtagmodal"
                title="Add New Tag"
                :mask-closable = "false"
                :closable = "false"
                >
                <Input v-model="tagdata.tagName" placeholder="Enter Tag Name"/>
                <div slot="footer">
                    <button @click="addtagmodal=false">Close</button>
                    <button @click="addTag" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add Tag'}}</button>
                </div>
            </Modal> -->
                <!-- EditModal -->
             <!-- <Modal
                v-model="editmodal"
                title="Edit Tag"
                :mask-closable = "false"
                :closable = "false"
                >
                <Input v-model="editData.tagName" placeholder="Edit Tag Name"/>
                <div slot="footer">
                    <button @click="editmodal=false">Close</button>
                    <button @click="editTag" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add Tag'}}</button>
                </div>
            </Modal> -->

    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        name: "ManageUsers",
        props: ["user"],
        data () {
            return {
                   users:[]
            }
        },
        methods: {
            async getUsers(){
                const {data} = await axios.get("/users/get-users");
                this.users = data;
            }

        },
        mounted(){
            this.getUsers();
        },

    }
</script>
<style scoped>
    .tagtable{
        padding: 80px;
    }

    th{
        padding: 10px 20px;
        text-align: left;
        font-size: 14px;
        font-weight: bold;
        font-family: 'Poppins',sans-serif;
    }

    td{
         padding: 10px 20px;
         text-align: left;
          font-family: 'Poppins',sans-serif;
    }

    tr{
        flex-grow: 1;
         /* box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08); */
    }

    button{
        box-shadow: none;
        padding: 10px 20px;
        border:none;
        background-color:transparent;
    }

    button:focus{
        outline: none;
        color: #EC6110;
    }

    .addtag-btn{
        background-color: #516b91;
        margin-bottom: 10px;
        padding: 15px 40px;
        font-size: 14px;
        color:#fff;
        text-transform: uppercase;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

    button:hover{
        color: #EC6110;
    }

    table{
        width: 100%;
    }


    tr:hover{
        background-color: #516b91;
        color:#fff;
    }

     .header{
        background-color:#fff;
        color:#515a6e;
        box-shadow: none;
    }

    .header:hover{
        background-color:#fff;
        color:#303030;
        box-shadow: none;
    }

    tr:nth-child(even){
       background-color: #f8f8f9;
       box-shadow: none;
    }


    tr:nth-child(even):hover{
        background-color: #516b91;
    }


</style>

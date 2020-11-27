<template>
    <div class="tagtable">
          <button @click="addtagmodal=true" class="addtag-btn">Add Admin</button>
          <!-- <Table border :columns="tags" :data="tags"></Table> -->
          <!-- Tag adding modal   -->


            <table class="tag-table">
            <tr class="header">
                <th>#</th>
                <th>ID</th>
                <th>FullName</th>
                <th>Email</th>
                <th>UserType</th>
                <th>Action</th>
            </tr>

                <tr v-for="(user, i) in currentusers" :key="i" v-if="currentusers.length">
                    <td><input type="checkbox"/></td>
                    <td><Tag>{{user.id}}</Tag></td>
                    <td>{{user.fullname}}</td>
                    <td>{{user.email}}</td>
                    <td><Tag type="dot" color="success">{{user.userType}}</Tag></td>
                    <td>
                        <div>
                            <button><Icon type="md-create" size="22" @click="showEditModal(user, i)"/></button>
                            <button><Icon type="ios-trash-outline" :loading="user.isDelecting" @click="showDeleteModal(user, i)"  size="22"/></button>
                        </div>
                    </td>
                </tr>

            </table>
            <Modal
                v-model="addtagmodal"
                title="Add New User"
                :mask-closable = "false"
                :closable = "false"
                >
                <label>Fullname</label>
                <Input type="text" v-model="data.fullname" placeholder="Enter Full Name"/>
                <br>
                 <label>Email</label>
                <Input type="email" v-model="data.email" placeholder="Enter Email Name"/>
                <br>
                 <label>Password</label>
                <Input type="password" v-model="data.password" placeholder="Enter Password"/>
                <br>
                  <label>User Role</label>
                <Select v-model="data.role_id" style="width:100%" placeholder="Select User Role">
                       <Option :value="r.id" v-for="(r,i) in roles" :key="i" v-if="roles.length">{{r.roleName}}</Option>
                </Select>

                <div slot="footer">
                    <button @click="addtagmodal=false">Close</button>
                    <button class="add-btn" @click="addAdmin" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add User'}}</button>
                </div>
            </Modal>
                <!-- EditModal -->
             <Modal
                v-model="editModal"
                title="Edit User"
                :mask-closable = "false"
                :closable = "false"
                >
                 <label>Fullname</label>
                <Input type="text" v-model="editData.fullname" placeholder="Enter Full Name"/>
                <br>
                 <label>Email</label>
                <Input type="email" v-model="editData.email" placeholder="Enter Email Name"/>
                <br>
                 <Input type="email" v-model="editData.password" placeholder="Enter Password "/>
                <br>

                  <label>User Role</label>
                <Select v-model="editData.role_id" style="width:100%" placeholder="Select User Role">
                    <Option :value="r.id" v-for="(r,i) in roles" :key="i" v-if="roles.length">{{r.roleName}}</Option>
                </Select>
                <div slot="footer">
                    <button @click="editModal=false">Close</button>
                    <button class="addtag-btn" @click="editUser" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Edit User'}}</button>
                </div>
            </Modal>
                 <!-- DeleteModal -->

             <Modal v-model="DeleteModal" width="360">
                <p slot="header" style="color:#f60;text-align:center">
                    <Icon type="ios-information-circle"></Icon>
                    <span>Delete confirmation?</span>
                </p>
                <div style="text-align:center">
                    <p>Deleting removes data premanently  the database.</p>
                </div>
                <div slot="footer">
                    <Button class="red" type="default" size="large" long :loading="isDeleting" :disabled="isDeleting" @click="deleteUser">Delete User</Button>
                     <Button type="default" size="large" long @click="closeModal">Close</Button>
                </div>
             </Modal>

    </div>
</template>
<script>
    import axios from 'axios'
    import { mapGetters } from 'vuex'
    export default {


         components : {

        },

        data () {
            return {

                data:{
                    fullname: '',
                    email: '',
                    password: '',
                    // userType: 'Admin',
                    role_id: null,
                },
                addtagmodal : false,
                editModal:false,
                isAdding : false,
                currentusers:[],
                editData : {
                    fullname: '',
                    email: '',
                    password: '',
                    userType: 'Admin',
                },
                index : -1,
                DeleteModal: false,
                isDeleting : false,
                deleteItem: {},
                deletingIndex: -1,
                roles:[],
            }
        },
        methods: {

            async addAdmin(){
            if(this.data.fullname.trim()=='') return this.error('Full name is required')
            if(this.data.email.trim()=='') return this.error('Email name is required')
            if(this.data.password.trim()=='') return this.error('Password name is required')
			const res = await this.callApi('post', 'app/create_adminusers', this.data)
			if(res.status===201){
				this.currentusers.unshift(res.data)
				this.success('User has been added successfully!')
				this.addtagmodal = false
                this.data.fullname = ''
                this.data.email = ''
                this.data.password = ''
			}else{
				if(res.status==422){
					for(let i in res.data.errors){
                        this.error(res.data.errors[i][0])
                    }
				}else{
					this.swr()
				}

			}
        },

            async editUser(){
                if(this.editData.fullname.trim()=='') return this.error('Full name is required')
                if(this.editData.email.trim()=='') return this.error('Email name is required')
                // if(this.editData.password.trim()=='') return this.error('Password name is required')
                const res = await this.callApi('post', 'app/edit_adminusers', this.editData)
                if(res.status===200){
                    this.currentusers[this.index] = this.editData
                    this.success('User has been edited successfully!')
                    this.editModal = false

                }else{
                    if(res.status==422){
                       for(let i in res.data.errors){
                        this.error(res.data.errors[i][0])
                        }
                    }else{
                        this.swr()
                    }

                }
            },
            showEditModal(user, index){
                let obj = {
                    id : user.id,
                    fullname : user.fullname,
                    email: user.email,
                    userType: user.userType,
                }
                this.editData = obj
                this.editModal = true
                this.index = index
            },

            async deleteUser(user,i){
                const res = await this.callApi('post', 'app/delete_adminusers', this.deleteItem)
                if(res.status === 200){
                    this.currentusers.splice(this.deletingIndex,1)
                    this.success('User deleted successfully')
                }else{
                    this.swr()
                }
                this.isDeleting = false
                this.DeleteModal = false
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

            showDeleteModal(user, i){

               this.deleteItem = user
               this.deletingIndex = i
               this.DeleteModal = true
            },

            closeModal(){
                 this.DeleteModal = false
            },

        },


        mounted(){
            // this.loadTags();
        },

                async created(){

                        const [res, resRole] = await Promise.all([
                            this.callApi('get','app/get_adminusers'),
                            this.callApi('get', 'app/get_roles')
                        ])

                        if(res.status==200){
                            this.currentusers = res.data
                        }else{
                            this.something()
                        }

                        if(resRole.status==200){
                            this.roles = resRole.data
                        }else{
                            this.something()
                        }

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
          border:1px solid rgb(201, 201, 201);
    }


    button{
        box-shadow: none;
        padding: 10px 20px;
        border:none;
        background-color:transparent;
        transition: 1s;
    }

    button:focus{
        outline: none;
    }

    .addtag-btn{
         background-color: #2d8cf0;
        margin-bottom: 10px;
        padding: 12px 28px;
        font-size: 11px;
        color: #fff;
        text-transform: uppercase;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

    button:hover{
         transform: translateY(-5px);
         color: #000;
    }

    table{
        width: 100%;
    }


    tr:hover{
         background-color:#a8def8;
    }

     .header{
        /* background-color:#fff; */
        color:#515a6e;
        box-shadow: none;
    }

    .header:hover{
        background-color: transparent;
        color:#303030;
        box-shadow: none;
        border:none;
    }

    tr:nth-child(even){
       background-color: #f8f8f9;
       box-shadow: none;
    }


    tr:nth-child(even):hover{
        background-color:#a8def8;
    }

    .ivu-modal-footer button+button {
     margin-left: 0px !important;
     margin-bottom: 0;
    }


       .red{
        color:rgb(240, 56, 56);
        font-weight: bold !important;
    }

        .add-btn{
        background-color: #2d8cf0;
        margin-bottom: 10px;
        padding: 12px 28px;
        font-size: 11px;
        color: #fff;
        text-transform: uppercase;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1), 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

    label{
        font-weight: bold;

    }


</style>

<template>
     <div class="tagtable">
          <button @click="addrolemodal=true" class="addtag-btn">Add New Role</button>
          <!-- <Table border :columns="roles" :data="roles"></Table> -->
          <!-- Tag adding modal   -->

            <table class="tag-table">
            <tr class="header">
                <th>#</th>
                <th>ID</th>
                <th>RoleName</th>
                <th>Action</th>
            </tr>

                <tr v-for="(role, i) in roles" :key="i" v-if="roles.length">
                    <td><input type="checkbox"/></td>
                    <td><Tag>{{role.id}}</Tag></td>
                    <td><Tag type="dot" color="primary">{{role.roleName}}</Tag></td>
                    <td>
                        <div>
                            <button><Icon type="md-create" size="22" @click="showEditModal(role, i)"/></button>
                            <button><Icon type="ios-trash-outline" :loading="role.isDelecting" @click="showDeleteModal(role, i)"  size="22"/></button>
                        </div>
                    </td>
                </tr>

            </table>
            <Modal
                v-model="addrolemodal"
                title="Add New Role"
                :mask-closable = "false"
                :closable = "false"
                >
                <Input v-model="data.roleName" placeholder="Enter Role Name"/>
                <div slot="footer">
                    <button @click="addrolemodal=false">Close</button>
                    <button class="add-btn" @click="add" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add Role'}}</button>
                </div>
            </Modal>
                <!-- EditModal -->
             <Modal
                v-model="editModal"
                title="Edit Role"
                :mask-closable = "false"
                :closable = "false"
                >
                <Input v-model="editData.roleName" placeholder="Edit Role Name"/>
                <div slot="footer">
                    <button @click="editModal=false">Close</button>
                    <button @click="edit" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add Role'}}</button>
                </div>
            </Modal>
                 <!-- DeleteModal -->

             <Modal v-model="DeleteModal" width="360">
                <p slot="header" style="color:#f60;text-align:center">
                    <Icon type="ios-information-circle"></Icon>
                    <span>Delete confirmation?</span>
                </p>
                <div style="text-align:center">
                    <p>Deleting removes data from database.</p>
                </div>
                <div slot="footer">
                    <Button class="red" type="default" size="large" long :loading="isDeleting" :disabled="isDeleting" @click="deleteRole">DeleteRole</Button>
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
                    roleName: ''
                },
                addrolemodal : false,
                editModal:false,
                isAdding : false,
                roles:[],
                editData : {
                     roleName: ''
                },
                index : -1,
                DeleteModal: false,
                isDeleting : false,
                deleteItem: {},
                deletingIndex: -1
            }
        },
        methods: {

            async add(){
			if(this.data.roleName.trim()=='') return this.error('Role name is required')
			const res = await this.callApi('post', 'app/create_role', this.data)
			if(res.status===201){
				this.roles.unshift(res.data)
				this.success('Role has been added successfully!')
				this.addrolemodal = false
				this.data.roleName = ''
			}else{
				if(res.status==422){
					if(res.data.errors.roleName){
						this.error(res.data.errors.roleName[0])
					}

				}else{
					this.swr()
				}

			}
},

            async edit(){
                if(this.editData.roleName.trim()=='') return this.error('Role name is required')
                const res = await this.callApi('post', 'app/edit_role', this.editData)
                if(res.status===200){
                    this.roles[this.index].roleName = this.editData.roleName
                    this.success('Role has been edited successfully!')
                    this.editModal = false

                }else{
                    if(res.status==422){
                        if(res.data.errors.roleName){
                            this.error(res.data.errors.roleName[0])
                        }

                    }else{
                        this.swr()
                    }

                }
            },
            showEditModal(role, index){
                let obj = {
                    id : role.id,
                    roleName : role.roleName
                }
                this.editData = obj
                this.editModal = true
                this.index = index
            },

            async deleteRole(role,i){
                const res = await this.callApi('post', 'app/delete_role', this.deleteItem)
                if(res.status === 200){
                    this.roles.splice(this.deletingIndex,1)
                    this.success('Role deleted successfully')
                }else{
                    this.swr()
                }
                this.isDeleting = false
                this.DeleteModal = false
            },

            // loadroles: function(){
            //     // load API
            //     //assign this categories
            //     // catch errors

            //     axios.get('/roles')
            //     .then((response)=>{
            //         this.roles = response.data.data;
            //     })
            //     .catch(function (error){
            //         console.log(error);
            //     });
            // },

            showDeleteModal(role, i){

               this.deleteItem = role
               this.deletingIndex = i
               this.DeleteModal = true
            },

            closeModal(){
                 this.DeleteModal = false
            },

        },


        mounted(){

        },

                async created(){
                        const res = await this.callApi('get','app/get_roles')
                        if(res.status==200){
                            this.roles = res.data
                        }else{
                            this.something()
                        }
                },


    }
</script>

<style scoped>


      .roletable{
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
         background-color:#92d4f5;
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

</style>

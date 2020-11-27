<template>
    <div class="tagtable">
          <button @click="addtagmodal=true" class="addtag-btn">Add Category</button>
          <!-- <Table border :columns="tags" :data="tags"></Table> -->
          <!-- Tag adding modal   -->


            <table class="tag-table">
            <tr class="header">
                <th>#</th>
                <th>ID</th>
                <th>IconImage</th>
                <th>CategoryName</th>
                <th>Action</th>
            </tr>

                <tr v-for="(category, i) in categories" :key="i" v-if="categories.length">
                    <td><input type="checkbox"/></td>
                    <td><Tag>{{category.id}}</Tag></td>
                    <td class="table--img">
                        <img :src="category.IconImage"/>
                    </td>
                    <td><Tag type="dot" color="success">{{category.categoryName}}</Tag></td>
                    <td>
                        <div>
                            <button><Icon type="md-create" size="22" @click="showEditModal(category, i)"/></button>
                            <button><Icon type="ios-trash-outline" :loading="category.isDelecting" @click="showDeleteModal(category, i)"  size="22"/></button>
                        </div>
                    </td>
                </tr>

            </table>


            <Modal
                v-model="addtagmodal"
                title="Add New Category"
                :mask-closable = "false"
                :closable = "false"
                >
                <Input v-model="data.categoryName" placeholder="Add Category Name"/>
                <Upload
                    ref="uploads"
                    multiple
                    type="drag"
                    :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                    :on-success="handleSuccess"
                    :on-error="handleError"
                    :max-size="2048"
                    :on-exceeded-size="handleMaxSize"
                    :on-format-error="handleFormatError"
                    :format="['jpg','jpeg','png']"
                    action="app/upload">
                    <div style="padding: 20px 0">
                        <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                        <p>Click or drag files here to upload</p>
                    </div>
                </Upload>

            <div class="image" v-if="data.iconImage">
                <img  :src ="`${data.iconImage}`" />
                <Icon type="ios-trash-outline" @click="deleteImage"></Icon>
            </div>
                <div slot="footer">
                    <button @click="addtagmodal=false">Close</button>
                    <button class="add-btn" @click="addCategory" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add Category'}}</button>
                </div>
            </Modal>
                <!-- EditModal -->
             <Modal
                v-model="editModal"
                title="Edit Category"
                :mask-closable = "false"
                :closable = "false"
                >
                <Input v-model="editData.categoryName" placeholder="Add Category Name"/>
                <Upload v-show="isIconImageNew"
                    ref="editDatauploads"
                    multiple
                    type="drag"
                    :headers="{'x-csrf-token' : token, 'X-Requested-With' : 'XMLHttpRequest'}"
                    :on-success="handleSuccess"
                    :on-error="handleError"
                    :max-size="2048"
                    :on-exceeded-size="handleMaxSize"
                    :on-format-error="handleFormatError"
                    :format="['jpg','jpeg','png']"
                    action="app/upload">
                    <div style="padding: 20px 0">
                        <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
                        <p>Click or drag files here to upload</p>
                    </div>
                </Upload>

            <div class="image" v-if="editData.IconImage">
                <img  :src ="`${editData.IconImage}`" />
                <Icon type="ios-trash-outline" @click="deleteImage(false)"></Icon>
            </div>
                <div slot="footer">
                    <button @click="closedEditModal=false">Close</button>
                    <button @click="editCategory" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding...': 'Add Category'}}</button>
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
                    <Button class="red" type="default" size="large" long :loading="isDeleting" :disabled="isDeleting" @click="deleteCategory">Delete</Button>
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
                    iconImage: '',
                    categoryName: ''
                },
                addtagmodal : false,
                editModal:false,
                isAdding : false,
                categories:[],
                editData : {
                     categoryName: ''
                },
                index : -1,
                DeleteModal: false,
                isDeleting : false,
                deleteItem: {},
                deletingIndex: -1,
                token: '',
                isIconImageNew: false,
                isEditingItem: false,
            }
        },
        methods: {

            async addCategory(){
            if(this.data.categoryName.trim()=='') return this.error('Category name is required')
            if(this.data.iconImage.trim()=='') return this.error('IconImage is required')
             this.data.iconImage = `${this.data.iconImage}`
			const res = await this.callApi('post', 'app/create_category', this.data)
			if(res.status===201){
				this.categories.unshift(res.data)
				this.success('Category has been added successfully!')
				this.addtagmodal = false
                this.data.categoryName = ''
                this.data.iconImage = ''
			}else{
				if(res.status==422){
					if(res.data.errors.categoryName){
						this.error(res.data.errors.categoryName[0])
                    }
                    	if(res.data.errors.iconImage){
						this.error(res.data.errors.iconImage[0])
					}


				}else{
					this.swr()
				}

			}
		},

            async editCategory(){
                if(this.editData.categoryName.trim()=='') return this.error('Category name is required')
                if(this.editData.iconImage.trim()=='') return this.error('IconImage name is required')
                // this.data.iconImage = `/uploads/${this.data.iconImage}`
                const res = await this.callApi('post', 'app/edit_category', this.editData)
                if(res.status===200){
                    this.categories[this.index].categoryName = this.editData.categoryName
                    this.success('Category has been edited successfully!')
                    this.editModal = false

                }else{
                    if(res.status==422){
                        if(res.data.errors.categoryName){
                            this.error(res.data.errors.categoryName[0])
                        }
                        if(res.data.errors.iconImage){
						this.error(res.data.errors.iconImage[0])
					}

                    }else{
                        this.swr()
                    }

                }
            },
            showEditModal(category, index){
                //  let obj = {
                //     id : category.id,
                //     categoryName : category.categoryName
                // }
                this.editData = category
                this.editModal = true
                this.index = index
                this.isEditingItem = true
            },

            async deleteCategory(category,i){
                const res = await this.callApi('post', 'app/delete_category', this.deleteItem)
                if(res.status === 200){
                    this.categories.splice(this.deletingIndex,1)
                    this.success('Category deleted successfully')
                }else{
                    this.swr()
                }
                this.isDeleting = false
                this.DeleteModal = false
            },

            showDeleteModal(category, i){

               this.deleteItem = category
               this.deletingIndex = i
               this.DeleteModal = true

            },

            handleSuccess (res, file) {
                res = `/uploads/${res}`
                if(this.isEditingItem){return this.editData.iconImage = res}
                this.data.iconImage = res
            },

            handleError (res, file) {
                 console.log('res',res)
                  console.log('res',file)
                 this.$Notice.warning({
                    title: 'The file format is incorrect',
                    desc: `${file.errors.file.length ? file.errors.file[0] : 'Something went wrong'} `
                });
            },

            handleFormatError (file) {
                this.$Notice.warning({
                    title: 'The file format is incorrect',
                    desc: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
                });
            },
            handleMaxSize (file) {
                this.$Notice.warning({
                    title: 'Exceeding file size limit',
                    desc: 'File  ' + file.name + ' is too large, no more than 2M.'
                });
            },

            async deleteImage(isAdd=true){
                let image
               if(!isAdd){
                   this.isIconImageNew = true
                   image =this.editData.IconImage
                   this.editData.IconImage = ''
                   this.$refs.editDatauploads.clearFiles()
               }
               else{
                    image =this.data.iconImage
                    this.data.iconImage = ''
                    this.$refs.uploads.clearFiles()
               }

               const res = await this.callApi('post', 'app/delete_image', {imageName: image})
               if(res.status!=200){
                   this.data.iconImage = iconImage
                   this.swr()
               }
            },

            closedEditModal(){
                this.isEditingItem = false
                this.editModal = false
            },

            closeModal(){
                 this.DeleteModal = false
            },


        },


        async created(){
                this.token = window.Laravel.csrfToken
                const res = await this.callApi('get','app/get_category')
                if(res.status==200){
                    this.categories = res.data
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


     .table--img{
        width: 60px;
        height: 60px;
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

<template>
    <div>
        <router-view></router-view>
        <!-- <div v-if="isLogging">
             <div class="overlay first">
                 <div class="admin-overlay">
                    <h3>Loading...</h3>
                </div>
            </div>
        </div> -->
        <div class="wrapper">
            <!-- OVERLAY
            =============================== -->
            <div class="overlay first">
                <div class="admin-overlay">
                    <h3>USERDASHBOARD</h3>
                </div>
            </div>

            <!-- <router-link to="/" exact>
            <div class="brand-title">
                <h3>YOUTH</h3>
                <h3 class="orange">CREATOR.</h3>
            </div>
            </router-link> -->

            <!-- NAVBAR
            =============================== -->
            <nav class="navbar">
                <div class="menu">
                    <UserProfileNavbar />
                </div>
                <div class="lang account-2">
                    <Icon
                        class="dash--icon"
                        type="ios-notifications"
                        size="22"
                    />
                </div>

                <div class="lang account-2">
                    <button @click="addScenariomodal = true">Scenario</button>
                </div>
                <div class="lang account">
                    <button @click="addpostmodal = true">POST</button>
                </div>
            </nav>

            <div class="profile">
                <div class="profile--area">
                    <div class="contributors">
                        <TopContributors />
                    </div>
                    <div class="profile--name">
                        <h3>Scenario Area</h3>
                    </div>
                    <div class="Scenario-area">
                        <div
                            class="post-card"
                            v-for="(post, i) in posts"
                            :key="i"
                            v-if="posts.length"
                        >
                            <div class="user-img">
                                <img
                                    src="../../assets/8.png"
                                    alt="profile image"
                                />
                            </div>
                            <div class="fab">
                                <Dropdown
                                    trigger="click"
                                    style="margin-left: 20px"
                                >
                                    <a href="javascript:void(0)">
                                        <Icon type="md-more" size="22" />
                                    </a>
                                    <DropdownMenu slot="list">
                                        <DropdownItem
                                            ><button
                                                @click="showEditModal(post, i)"
                                            >
                                                <Icon type="md-create" />
                                                Edit
                                            </button>
                                        </DropdownItem>
                                        <DropdownItem style="color: #ed4014">
                                            <button
                                                @click="
                                                    showDeleteModal(post, i)
                                                "
                                            >
                                                <Icon type="ios-trash" />
                                                Delete
                                            </button>
                                        </DropdownItem>
                                    </DropdownMenu>
                                </Dropdown>
                            </div>
                            <div class="feature-image">
                                <img :src="post.postImage" />
                            </div>
                            <div class="user-info">
                                <h5>{{ $store.state.profile.name }}</h5>
                                <h5>5hr</h5>
                            </div>
                            <div class="post-title">
                                <h4>{{ post.title }}</h4>
                            </div>

                            <div class="post-description">
                                <p>
                                    {{ post.post_description }}
                                </p>
                            </div>
                            <hr />
                            <button class="social">
                                <Icon type="md-heart" size="22" />
                            </button>
                            <button class="social">
                                <Icon type="ios-chatbubbles" size="22" />
                            </button>
                            <CommentWrapper />
                        </div>
                        <div
                            class="Scenario-card"
                            v-for="(Scenario, i) in Scenarios"
                            :key="i"
                            v-if="Scenarios.length"
                        >
                            <div class="user-img">
                                <img
                                    src="../../assets/8.png"
                                    alt="profile image"
                                />
                            </div>
                            <div class="fab">
                                <!-- <button>
                                <Icon type="md-more" size="22"/>
                              </button> -->
                                <Dropdown
                                    trigger="click"
                                    style="margin-left: 20px"
                                >
                                    <a href="javascript:void(0)">
                                        <Icon type="md-more" size="22" />
                                    </a>
                                    <DropdownMenu slot="list">
                                        <DropdownItem
                                            ><button
                                                @click="
                                                    showScenarioEditModal(
                                                        Scenario,
                                                        i
                                                    )
                                                "
                                            >
                                                <Icon type="md-create" />
                                                Edit
                                            </button>
                                        </DropdownItem>
                                        <DropdownItem style="color: #ed4014"
                                            ><button
                                                @click="
                                                    showScenarioDeleteModal(
                                                        Scenario,
                                                        i
                                                    )
                                                "
                                            >
                                                <Icon type="md-create" />
                                                Delete
                                            </button>
                                        </DropdownItem>
                                    </DropdownMenu>
                                </Dropdown>
                            </div>
                            <div class="Scenario-info">
                                <h5>{{ $store.state.profile.name }}</h5>
                                <h5>10h</h5>
                            </div>
                            <div class="Scenario-title">
                                <h4>{{ Scenario.Scenario_title }}</h4>
                            </div>
                            <hr />
                            <div class="Scenario-description">
                                <p>
                                    {{ Scenario.Scenario_description }}
                                </p>
                            </div>
                            <hr />
                            <Icon type="md-heart" size="22" />
                            <button>
                                  <Icon  @click="addcommentmodal = true" type="ios-chatbubbles" size="22" />
                            </button>
                            <div>
                                   <div v-for="comment in comments" v-bind:key="comment.id">
                                    <Comment :comment="comment" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile--img">
                    <DashSidebar/>
                </div>
            </div>
        </div>
        <!-- AddModal -->
        <Modal
            v-model="addpostmodal"
            title="Add New Post"
            :mask-closable="false"
            :closable="false"
        >
            <form>
                <Input v-model="data.title" placeholder="Enter Post Title" />
                <label>Feature Image</label>
                <Upload
                    ref="uploads"
                    multiple
                    type="drag"
                    :headers="{
                        'x-csrf-token': token,
                        'X-Requested-With': 'XMLHttpRequest'
                    }"
                    :on-success="handleSuccess"
                    :on-error="handleError"
                    :max-size="2048"
                    :on-exceeded-size="handleMaxSize"
                    :on-format-error="handleFormatError"
                    :format="['jpg', 'jpeg', 'png']"
                    action="app/user_upload"
                >
                    <div style="padding: 20px 0">
                        <Icon
                            type="ios-cloud-upload"
                            size="52"
                            style="color: #3399ff"
                        ></Icon>
                        <p>Click or drag files here to upload</p>
                    </div>
                </Upload>

                <div class="image" v-if="data.postImage">
                    <img :src="`${data.postImage}`" />
                    <Icon type="ios-trash-outline" @click="deleteImage"></Icon>
                </div>
                <textarea
                    v-model="data.post_description"
                    placeholder="Enter Post Description"
                />
            </form>
            <div slot="footer">
                <button @click="addpostmodal = false">Cancel</button>
                <button
                    class="add-btn"
                    @click="add"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Add Post" }}
                </button>
            </div>
        </Modal>
        <!-- EditModal -->
        <Modal
            v-model="editModal"
            title="Edit Post"
            :mask-closable="false"
            :closable="false"
        >
            <Input v-model="editData.title" placeholder="Edit Post Title" />
            <Upload
                v-show="isIconImageNew"
                ref="editDatauploads"
                multiple
                type="drag"
                :headers="{
                    'x-csrf-token': token,
                    'X-Requested-With': 'XMLHttpRequest'
                }"
                :on-success="handleSuccess"
                :on-error="handleError"
                :max-size="2048"
                :on-exceeded-size="handleMaxSize"
                :on-format-error="handleFormatError"
                :format="['jpg', 'jpeg', 'png']"
                action="app/user_upload"
            >
                <div style="padding: 20px 0">
                    <Icon
                        type="ios-cloud-upload"
                        size="52"
                        style="color: #3399ff"
                    ></Icon>
                    <p>Click or drag files here to upload</p>
                </div>
            </Upload>

            <div class="image" v-if="editData.postImage">
                <img :src="`${editData.postImage}`" />
                <Icon
                    type="ios-trash-outline"
                    @click="deleteImage(false)"
                ></Icon>
            </div>
            <Input
                v-model="editData.post_description"
                placeholder="Enter Post Description"
            />
            <div slot="footer">
                <button @click="editModal = false">Close</button>
                <button @click="edit" :disabled="isAdding" :loading="isAdding">
                    {{ isAdding ? "Adding..." : "Update Post" }}
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
                    @click="deletePost"
                    >Delete</Button
                >
                <Button type="default" size="large" long @click="closeModal"
                    >Close</Button
                >
            </div>
        </Modal>
        <!-- AddScenarioModal -->
        <Modal
            v-model="addScenariomodal"
            title="Add New Scenario"
            :mask-closable="false"
            :closable="false"
        >
            <form>
                <Input
                    v-model="data.Scenario_title"
                    placeholder="Enter Scenario Title"
                />
                <textarea
                    v-model="data.Scenario_description"
                    placeholder="Enter Scenario Description"
                />
            </form>
            <div slot="footer">
                <button @click="addScenariomodal = false">Cancel</button>
                <button
                    class="add-btn"
                    @click="addScenario"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Add Scenario" }}
                </button>
            </div>
        </Modal>
        <!-- EditScenarioModal -->
        <Modal
            v-model="editScenarioModal"
            title="Scenario Post"
            :mask-closable="false"
            :closable="false"
        >
            <Input
                v-model="editData.Scenario_title"
                placeholder="Edit Scenario Title"
            />
            <Input
                v-model="editData.Scenario_description"
                placeholder="Enter Scenario Description"
            />
            <div slot="footer">
                <button @click="editScenarioModal = false">Close</button>
                <button
                    @click="editScenario"
                    :disabled="isAdding"
                    :loading="isAdding"
                >
                    {{ isAdding ? "Adding..." : "Update Post" }}
                </button>
            </div>
        </Modal>
        <!-- DeleteScenarioModal -->
        <Modal v-model="DeleteScenarioModal" width="360">
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
                    @click="deleteScenario"
                    >Delete</Button
                >
                <Button
                    type="default"
                    size="large"
                    long
                    @click="closeScenarioModal"
                    >Close</Button
                >
            </div>
        </Modal>
        <!-- Add comment -->
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
import Axios from "axios";
import UserProfileNavbar from "../components/UserProfileNavbar";
import TopContributors from "../components/TopContributors";
import DashSidebar from "../components/DashSiderbar";
import Comment from "../components/Comments/Comment";
export default {
    data() {
        return {
            visible: false,
            isLogging: true,

            data: {
                title: "",
                postImage: "",
                post_description: '',
                Scenario_title: "",
                Scenario_description: ""
            },
            addpostmodal: false,
            addScenariomodal: false,
            editModal: false,
            editScenarioModal: false,
            isAdding: false,
            posts: [],
            Scenarios: [],
            editData: {
                title: "",
                post_description: "",
                Scenario_title: "",
                Scenario_description: ""
            },
            index: -1,
            DeleteScenarioModal: false,
            DeleteModal: false,
            isDeleting: false,
            deleteItem: {},
            deletingIndex: -1,
            token: "",
            isIconImageNew: false,
            isEditingItem: false,
            addcommentmodal: false,
            comment: '',
            comments: [],
        };
    },

    components: {
        UserProfileNavbar,
        TopContributors,
        DashSidebar,
        Comment,
    },

    methods: {
        handleOpen() {
            this.visible = true;
        },
        handleClose() {
            this.visible = false;
        },

        async add() {
            if (this.data.title.trim() == "")
                return this.error("post title is required");
            if (this.data.postImage.trim() == "")
                return this.error("postImage is required");
            if (this.data.post_description.trim() == "")
                return this.error("post description is required");

            const res = await this.callApi(
                "post",
                "app/create_post",
                this.data
            );
            if (res.status === 201) {
                this.posts.unshift(res.data);
                this.success("post has been added successfully!");
                this.addpostmodal = false;
                this.data.title = '';
                this.data.postImage = '';
                this.data.post_description = '';
            } else {
                if (res.status == 422) {
                    if (res.data.errors.title) {
                        this.error(res.data.errors.title[0]);
                    }
                    if (res.data.errors.postImage) {
                        this.error(res.data.errors.postImage[0]);
                    }
                    if (res.data.errors.post_description) {
                        this.error(res.data.errors.post_description[0]);
                    }
                } else {
                    this.swr();
                }
            }
        },

        async edit() {
            if (this.editData.title.trim() == "")
                return this.error("post name is required");
            if (this.editData.postImage.trim() == "")
                return this.error("postImage name is required");
            if (this.editData.post_description.trim() == "")
                return this.error("post_description name is required");

            const res = await this.callApi(
                "post",
                "app/edit_post",
                this.editData
            );
            if (res.status === 200) {
                this.posts[this.index].title = this.editData.title;
                this.posts[
                    this.index
                ].post_description = this.editData.post_description;
                this.success("post has been edited successfully!");
                this.editModal = false;
            } else {
                if (res.status == 422) {
                    if (res.data.errors.title) {
                        this.error(res.data.errors.title[0]);
                    }
                    if (res.data.errors.postImage) {
                        this.error(res.data.errors.postImage[0]);
                    }
                    if (res.data.errors.post_description) {
                        this.error(res.data.errors.post_description[0]);
                    }
                } else {
                    this.swr();
                }
            }
        },
        showEditModal(post, index) {
            // let obj = {
            //     id: post.id,
            //     title: post.title,
            //     post_description: post_description,
            // };
            this.editData = post;
            this.editModal = true;
            this.index = index;
        },

        async deletePost(post, i) {
            const res = await this.callApi(
                "post",
                "app/delete_post",
                this.deleteItem
            );
            if (res.status === 200) {
                this.posts.splice(this.deletingIndex, 1);
                this.success("post deleted successfully");
            } else {
                this.swr();
            }
            this.isDeleting = false;
            this.DeleteModal = false;
        },

        showDeleteModal(post, i) {
            this.deleteItem = post;
            this.deletingIndex = i;
            this.DeleteModal = true;
        },

        async addScenario() {
            if (this.data.Scenario_title.trim() == "")
                return this.error("Scenario title is required");
            if (this.data.Scenario_description.trim() == "")
                return this.error("Scenario description is required");

            const res = await this.callApi(
                "post",
                "app/create_Scenario",
                this.data
            );
            if (res.status === 201) {
                this.Scenarios.unshift(res.data);
                this.success("Scenario has been added successfully!");
                this.addScenariomodal = false;
                this.data.Scenario_title = "";
                this.data.Scenario_description = "";
            } else {
                if (res.status == 422) {
                    if (res.data.errors.Scenario_title) {
                        this.error(res.data.errors.Scenario_title[0]);
                    }
                    if (res.data.errors.Scenario_description) {
                        this.error(res.data.errors.Scenario_description[0]);
                    }
                } else {
                    this.swr();
                }
            }
        },

        async editScenario() {
            if (this.editData.Scenario_title.trim() == "")
                return this.error("Scenario name is required");
            if (this.editData.Scenario_description.trim() == "")
                return this.error("Scenario_description name is required");

            const res = await this.callApi(
                "post",
                "app/edit_Scenario",
                this.editData
            );
            if (res.status === 200) {
                this.Scenarios[
                    this.index
                ].Scenario_title = this.editData.Scenario_title;
                this.Scenarios[
                    this.index
                ].Scenario_description = this.editData.Scenario_description;
                this.success("Scenario has been edited successfully!");
                this.editScenarioModal = false;
            } else {
                if (res.status == 422) {
                    if (res.data.errors.Scenario_title) {
                        this.error(res.data.errors.Scenario_title[0]);
                    }
                    if (res.data.errors.Scenario_description) {
                        this.error(res.data.errors.Scenario_description[0]);
                    }
                } else {
                    this.swr();
                }
            }
        },
        showScenarioEditModal(Scenario, index) {
            this.editData = Scenario;
            this.editScenarioModal = true;
            this.index = index;
        },

        async deleteScenario(Scenario, i) {
            const res = await this.callApi(
                "post",
                "app/delete_Scenario",
                this.deleteItem
            );
            if (res.status === 200) {
                this.Scenarios.splice(this.deletingIndex, 1);
                this.success("Scenario deleted successfully");
            } else {
                this.swr();
            }
            this.isDeleting = false;
            this.DeleteScenarioModal = false;
        },

        showScenarioDeleteModal(Scenario, i) {
            this.deleteItem = Scenario;
            this.deletingIndex = i;
            this.DeleteScenarioModal = true;
        },

        handleSuccess(res, file) {
            res = `/Userpost/${res}`;
            if (this.isEditingItem) {
                return (this.editData.postImage = res);
            }
            this.data.postImage = res;
        },

        handleError(res, file) {
            console.log("res", res);
            console.log("res", file);
            this.$Notice.warning({
                title: "The file format is incorrect",
                desc: `${
                    file.errors.file.length
                        ? file.errors.file[0]
                        : "Something went wrong"
                } `
            });
        },

        handleFormatError(file) {
            this.$Notice.warning({
                title: "The file format is incorrect",
                desc:
                    "File format of " +
                    file.name +
                    " is incorrect, please select jpg or png."
            });
        },
        handleMaxSize(file) {
            this.$Notice.warning({
                title: "Exceeding file size limit",
                desc: "File  " + file.name + " is too large, no more than 2M."
            });
        },

        async deleteImage(isAdd = true) {
            let image;
            if (!isAdd) {
                this.isIconImageNew = true;
                image = this.editData.postImage;
                this.editData.postImage = '';
                this.$refs.editDatauploads.clearFiles();
            } else {
                image = this.data.postImage;
                this.data.postImage = '';
                this.$refs.uploads.clearFiles();
            }

            const res = await this.callApi("post", "app/user_delete_image", {
                imageName: image
            });
            if (res.status != 200) {
                this.data.postImage = postImage;
                this.swr();
            }
        },

        closeModal() {
            this.DeleteModal = false;
        },

        closeScenarioModal() {
            this.DeleteScenarioModal = false;
        },

          async addComment(){

            if (this.comment.trim() == "")
            return this.error("Comment is required");

            const data = {
                Comment_description : this.comment,
            }

            const res = await this.callApi("post", "app/add_comment", data);
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

    mounted() {
        TweenMax.to(".first", 1.5, {
            delay: 3,
            top: "-100%",
            opacity: 0,
            ease: Expo.easeInOut
        });

        TweenMax.to(".second", 1.5, {
            delay: 0.7,
            top: "-100%",
            ease: Expo.easeInOut
        });
        TweenMax.to(".third", 1.5, {
            delay: 0.9,
            top: "-100%",
            ease: Expo.easeInOut
        });

        TweenMax.from(".slider", 1.5, {
            delay: 2,
            opacity: 0,
            x: "-200",
            ease: Expo.easeInOut
        });

        // NAVBAR
        TweenMax.staggerFrom(
            ".navbar div",
            1.5,
            {
                delay: 1.5,
                opacity: 0,
                y: "20",
                ease: Expo.easeInOut
            },
            0.08
        );

          TweenMax.staggerFrom(".contributors div", 1.6, {
                delay: 1.3,
                opacity: 0,
                y: "30",
                ease: Expo.easeInOut
                }, 0.08);

        // MEDIA
        TweenMax.staggerFrom(
            ".media ul li",
            1.5,
            {
                delay: 1.5,
                opacity: 0,
                x: "-20",
                ease: Expo.easeInOut
            },
            0.08
        );


        //   axios.get('/api/user').then((res)=>{
        //         this.user = res.data
        //     });

        //     if(this.$store.state.token != ''){
        //     axios.post('/api/checkToken', {token : this.$store.state.token})
        //         .then(res =>{
        //             this.loading = false;
        //         })
        //         .catch(err => {
        //             this.loading = false;
        //             this.$store.commit('clearToken')
        //             this.$router.push('/loading')
        //         })

        //     }else{
        //         this.loading = false,
        //         this.$router.push('/login');
        //     }
    },

    async created() {
        this.token = window.Laravel.csrfToken;
        const [res, resRole, resComment] = await Promise.all([
            this.callApi("get", "app/get_posts"),
            this.callApi("get", "app/get_Scenarios"),
            this.callApi("get","app/get_comments"),
        ]);

        if (res.status == 200) {
            this.posts = res.data;
        } else {
            this.something();
        }

        if (resRole.status == 200) {
            this.Scenarios = resRole.data;
        } else {
            this.something();
        }
        if (resComment.status == 200) {
            this.comments = res.data;
        } else {
            this.something();
        }
    }
};
</script>

<style scoped>

textarea{
    width: 100%;
    resize: vertical;
    padding: 5px;
    border: 1px solid #ccc !important;
}

::placeholder{
    color: #ccc;
}

.feature-image {
    justify-content: center;
    align-content: center;
    text-align: center;
    height: 250px;
    width: 100%;
    overflow: hidden;
    margin-bottom: 10px;
}

.feature-image img {
    width: 100%;
    transition: 2s;
}

/* .feature-image img:hover {
    filter: grayscale(30%);
    transform: scale(1.1);
} */

.social {
    margin: 4px;
    margin-top: 8px;
    color: #b8b8b8;
}

.contributors {
    margin: 10px 0px;
    z-index: -90;
}

.user-info {
    padding: 10px;
    padding-bottom: 0px;
}

.user-info h5 {
    margin-left: 10px;
    font-size: 12px;
    color: #3451a0;
    display: inline-block;
}
.user-info h5:first-child {
    font-weight: bold;
}

.Scenario-info h5 {
    margin-left: 10px;
    font-size: 12px;
    color: #fff;
}
.Scenario-info h5:first-child {
    font-weight: bold;
}

.user-img img {
    width: 55px;
    border-radius: 15%;
    position: absolute;
    top: -20px;
    left: -20px;
    border: 6px solid #fff;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.fab {
    position: absolute;
    top: 10px;
    left: 85%;
}

.fab button {
    color: #303030;
}

.Scenario-card {
    margin: 10px;
    margin-left: 0px;
    padding: 30px;
    width: 30%;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    transition: 0.9s;
    background-color: #3451a0;
    border-top-left-radius: 30px;
    border-bottom-right-radius: 30px;
    min-width: 300px;
    position: relative;
}

.Scenario-card:hover {
    transform: translateY(-10px);
}

.post-card {
    margin: 10px;
    margin-left: 0px;
    width: 300px;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    transition: 0.9s;
    border-radius: 10px;
    min-width: 300px;
    position: relative;
}

.post-card:hover {
    transform: translateY(-10px);
}

.profile--name h3 {
    font-family: "Poppins", sans-serif !important;
    font-size: 14px;
    margin-left: 15px;
    color: #303030;
    margin-bottom: 40px;
}

.Scenario-title {
    margin-top: 15px;
    margin-bottom: 15px;
}

.Scenario-title h4 {
    font-size: 16px;
    color: #fff;
    font-weight: bold;
    font-family: "Poppins", sans-serif;
}

.post-description p {
    padding: 10px;
    padding-top: 2px;
    font-size: 12px;
    width: 200px;
}

.post-title {
    margin-top: 2px;
    margin-bottom: 10px;
    padding-left: 17px;
}

.post-title h4 {
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    font-weight: bold;
}
.post-description {
    padding-left: 10px;
}

.Scenario-description p {
    padding: 10px;
    font-size: 14px;
    max-width: 30vw;
    color: #fff;
}

.profile--area {
    padding: 30px;
    flex-grow: 2;
    max-width: 80%;
}

.Scenario-area {
    padding: 10px;
    display: flex;
    justify-content: space-around;
    flex-direction: row;
    flex-wrap: wrap;
}

.profile {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}

.profile--img {
    position: relative;
    padding: 8px;
    backdrop-filter: blur(20px);
    background-color: #303030;
    /* animation: hue-rotate 10s linear infinite; */
    flex-grow: 1;
    flex-wrap: wrap;
}
.brand-title {
    position: absolute;
    top: 2%;
    left: 4%;
}

.brand-title h3 {
    font-family: "Fenotype", sans-serif !important;
    display: inline-block;
}

.dash-area {
    padding: 7px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}

.account--icon1 button:focus {
    background-color: #ec6110;
    outline: none;
    color: #fff;
}

.dash--section {
    padding: 7px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}

.dash--icon {
    border-radius: 2px;
    padding: 10px;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.dash--icon:hover {
    color: #ec6110;
}

.account button {
    padding: 14px 40px;
    color: #fff;
    transition: 0.4s;
    border-radius: 2px;
    background-color: #303030;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account button:hover {
    background-color: #fff;
    color: #303030;
}

.account button:focus {
    box-shadow: none;
    outline: none;
    background-color: rgb(237, 237, 238);
    color: #303030;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account-2 button {
    padding: 14px 40px;
    color: #fff;
    transition: 0.4s;
    border-radius: 2px;
    background-color: #3451a0;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account-2 button:hover {
    background-color: #fff;
    color: #3451a0;
}

.account-2 button:focus {
    box-shadow: none;
    outline: none;
    background-color: #fff;
    color: #3451a0;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.orange {
    color: #ec6110;
    animation: hue-rotate 10s linear infinite;
}

.add-btn {
    background-color: #a0344f;
    margin-bottom: 10px;
    padding: 12px 28px;
    font-size: 11px;
    color: #fff;
    text-transform: uppercase;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.red {
    color: rgb(240, 56, 56);
    font-weight: bold !important;
}

/* Menu
=========================== */

.menu {
    position: relative;
    display: inline-block;
}

button {
    background-color: transparent;
    box-shadow: none;
    border: none;
}

.nav-section {
    width: 100%;
    /* height: 100vh; */
    overflow: hidden;
    color: #686868;
}

ul {
    list-style: none;
}

/* NAVBAR
=========================== */
.navbar {
    display: flex;
    justify-content: space-between;
    height: 80px;
    align-items: center;
}

.navbar > div {
    padding: 0 10px;
    font-size: 20px;
}

.navbar .menu {
    margin-right: auto;
}

.navbar .lang {
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
}

/* OVERLAY
=========================== */
.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0%;
    z-index: 99;
    animation: hue-rotate 10s linear infinite;
}

.first {
    background-color: rgba(255, 255, 255, 0.479);
}

.admin-overlay h3 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%);
    font-family: "Fenotype", sans-serif !important;
    font-weight: bold;
    font-size: 15rem;
    text-transform: uppercase;
}

.admin-overlay {
    position: relative;
    height: 100%;
}

a {
    transition: 0.6s ease-in-out;
}

.media a:hover {
    color: #452c63;
}

@keyframes hue-rotate {
    from {
        -webkit-filter: hue-rotate(0);
        -moz-filter: hue-rotate(0);
        -ms-filter: hue-rotate(0);
        filter: hue-rotate(0);
    }
    to {
        -webkit-filter: hue-rotate(360deg);
        -moz-filter: hue-rotate(360deg);
        -ms-filter: hue-rotate(360deg);
        filter: hue-rotate(360deg);
    }
}

/* Off Canvas
=========================== */

.menu img {
    width: 40px;
    padding: 7px;
    border-radius: 2px;
    padding: 10px;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    transition: 0.04s;
}

.menu img:hover {
    background-color: rgb(233, 233, 233);
    box-shadow: none;
}

@media only screen and (max-width: 420px) {
    .tabcontent {
        margin-top: 30px;
        padding: 0px;
        padding-top: 0px;
    }

    .admin-overlay h3 {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%);
        font-family: "Fenotype", sans-serif !important;
        font-weight: bold;
        font-size: 3rem;
        text-transform: uppercase;
    }

    .post-description p {
        padding: 10px;
        font-size: 14px;
        max-width: 300px;
    }

    .Scenario-description p {
        padding: 10px;
        font-size: 14px;
        max-width: 300px;
    }

    .user-img img {
        width: 55px;
        border-radius: 15%;
        position: absolute;
        top: -20px;
        left: -0px;
        border: 6px solid #fff;
        box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
            0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    }

    .user-info {
        padding-top: 10px;
    }

    .user-info h5 {
        margin-left: 40px;
        font-size: 12px;
        color: #3451a0;
    }

    .Scenario-info h5 {
        margin-left: 40px;
        font-size: 12px;
        color: #fff;
    }

    .fab {
        position: absolute;
        top: 10px;
        left: 75%;
    }

    .lang {
        display: none;
    }

    .profile--name h3 {
        font-family: "Poppins", sans-serif !important;
        font-size: 24px;
        margin-top: 20px;
        text-align: center;
        color: #303030;
        margin-bottom: 40px;
    }
}
</style>

<template>
    <div>
        <router-view></router-view>
        <UserProfileNavbar />
        <div class="profile">
            <div class="profile--area">
                <div class="profile--name">
                    <h3>{{ $store.state.profile.name }}</h3>
                </div>
                <div class="description--title">
                    <h4>The world is my runway</h4>
                </div>
                <div class="description--user">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit
                        anim id est laborum.
                    </p>
                    <SocialLinks />
                </div>
            </div>
            <div class="profile--img">
                <img src="../../assets/8.png" alt="profile image" />
            </div>
        </div>
    </div>
</template>

<script>
import UserProfileNavbar from "./UserProfileNavbar";
import SocialLinks from "./SocialLinks";
export default {
    components: {
        UserProfileNavbar,
        SocialLinks
    },

    data() {
        return {
            data: {
                user_title: '',
                user_description: '',
            },
            addrolemodal: false,
            editModal: false,
            isAdding: false,
            roles: [],
            editData: {
                user_title: '',
                user_description: '',
            },
            index: -1,
            DeleteModal: false,
            isDeleting: false,
            deleteItem: {},
            deletingIndex: -1
        };
    },

    async add() {
        if (this.data.roleName.trim() == "")
            return this.error("Role name is required");
        const res = await this.callApi("post", "app/create_role", this.data);
        if (res.status === 201) {
            this.roles.unshift(res.data);
            this.success("Role has been added successfully!");
            this.addrolemodal = false;
            this.data.roleName = "";
        } else {
            if (res.status == 422) {
                if (res.data.errors.roleName) {
                    this.error(res.data.errors.roleName[0]);
                }
            } else if (res.status == 403) {
                this.error("You are not allowed to access this route");
            } else {
                this.swr();
            }
        }
    },

    async edit() {
        if (this.editData.roleName.trim() == "")
            return this.error("Role name is required");
        const res = await this.callApi("post", "app/edit_role", this.editData);
        if (res.status === 200) {
            this.roles[this.index].roleName = this.editData.roleName;
            this.success("Role has been edited successfully!");
            this.editModal = false;
        } else {
            if (res.status == 422) {
                if (res.data.errors.roleName) {
                    this.error(res.data.errors.roleName[0]);
                }
            } else {
                this.swr();
            }
        }
    },

    async created() {
        const res = await this.callApi("get", "app/get_roles");
        if (res.status == 200) {
            this.roles = res.data;
        } else {
            this.something();
        }
    }
};
</script>

<style scoped>
.profile--name h3 {
    font-family: "Fenotype", sans-serif !important;
    font-size: 4vw;
    color: #000;
}

.description--title {
    margin-top: 15px;
    margin-bottom: 15px;
}

.description--title h4 {
    font-size: 24px;
}

.description--user p {
    font-size: 18px;
    max-width: 30vw;
}

.profile--area {
    padding: 40px;
    flex-grow: 1;
}

.profile {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: wrap;
}

.profile--img {
    padding: 50px;
    flex-grow: 2;
}

.profile--img img {
    width: 600px;
    border-bottom-right-radius: 50px;
    border-top-left-radius: 50px;
    transition: 0.9s;
}

.profile--img img:hover {
    filter: grayscale(80%);
}
</style>

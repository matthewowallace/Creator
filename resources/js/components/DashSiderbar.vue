<template>
    <div>
        <div>
            <h3>Lastest Post</h3>
            <a
                class="card"
                v-for="(post, i) in posts"
                :key="i"
                v-if="posts.length"
            >
                <h4>{{ post.title }}</h4>
                <p>{{ post.post_description }}</p>
                  <div class="saved">
                     <Icon type="ios-bookmark" size="22"/>
                </div>
            </a>
        </div>
        <div>
            <h3>Lastest Scenario</h3>
            <a
                class="scenario-card"
                v-for="(Scenario, i) in Scenarios"
                :key="i"
                v-if="Scenarios.length"
            >
                <h4>{{ Scenario.Scenario_title }}</h4>
                <div>
                      <p>{{ Scenario.Scenario_description }}</p>
                </div>
                <div class="saved">
                     <Icon type="ios-bookmark" size="22"/>
                </div>
            </a>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            visible: false,
            isLogging: true,

            data: {
                title: "",
                postImage: "",
                post_description: "",
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
            isEditingItem: false
        };
    },

    async created() {
        this.token = window.Laravel.csrfToken;
        const [res, resRole] = await Promise.all([
            this.callApi("get", "app/get_posts"),
            this.callApi("get", "app/get_Scenarios")
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
    }
};
</script>
<style scoped>
.card {
    position: relative;
    display: flex;
    background-color: rgba(255, 255, 255, 0.842);
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    padding: 10px;
    margin-bottom: 5px;
    transition: 0.8s;
     min-width: 200px;
    border-radius: 0px;
}

h3 {
    color: #fff;
    padding-left: 5px;
    margin-bottom: 10px;
    font-size: 16px;
}

.card h4 {
    font-size: 14px;
}

.card p {
    font-size: 10px;
    margin-top: 5px;
    color: #303030;
}

.card:hover{
    transform: translateY(-10px);
}

.scenario-card {
    position: relative;
    display: block;
    background-color:  #3451a0d2;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    padding: 10px;
    margin-bottom: 5px;
    transition: 0.8s;
    min-width: 200px;
}

h3 {
    color: #fff;
    padding-left: 5px;
    margin-bottom: 10px;
    font-size: 16px;
}

.scenario-card h4 {
    color:#fff;
    font-size: 14px;
}

.scenario-card p {
    font-size: 10px;
    margin-top: 5px;
    color: #fff;
}

.scenario-card:hover{
    transform: translateY(-10px);
}

.saved{
    position: absolute;
    left: 90%;
    top:26%
}

</style>

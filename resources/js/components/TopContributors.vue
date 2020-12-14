<template>
<div>
    <div class="header">
        <h4>Top contributors</h4>
    </div>
     <carousel>
        <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/8.png" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>{{ $store.state.profile.name }}</h4>
                    </div>
                </div>
            </div>
        </slide>
               <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/10.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>Chloe</h4>
                    </div>
                </div>
            </div>
        </slide>
        <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/11.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>Emily</h4>
                    </div>
                </div>
            </div>
        </slide>
         <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/9.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>{{ $store.state.profile.name }}</h4>
                    </div>
                </div>
            </div>
        </slide>
        <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/12.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>{{ $store.state.profile.name }}</h4>
                    </div>
                </div>
            </div>
        </slide>
        <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/13.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>{{ $store.state.profile.name }}</h4>
                    </div>
                </div>
            </div>
        </slide>
         <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/14.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>{{ $store.state.profile.name }}</h4>
                    </div>
                </div>
            </div>
        </slide>
        <slide>
            <div class="card-container">
                <div class="card">
                    <div class="card-holder">
                        <img src="../../assets/15.jpg" alt="aboutus icon" />
                    </div>
                    <div class="account-2">
                        <button @click="addScenariomodal = true">Follow</button>
                    </div>
                     <div class="card-name">
                        <h4>{{ $store.state.profile.name }}</h4>
                    </div>
                </div>
            </div>
        </slide>
    </carousel>
</div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";
export default {
    components: {
        Carousel,
        Slide
    }
};
</script>
<style scoped>

.header h4{
    color:#303030;
    font-size:14px;
    font-family: 'Poppins',sans-serif;
    margin-bottom: 30px;
    margin-left: 20px;
}

.card img {
    width: auto;
    height: auto;
    transform: translateY(-60px);
}
.card {
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    margin: 2px;
    border-radius: 10px;
    min-width: 200px;
    position: relative;
}

.card-holder {
    height: 200px;
    width: 200px;
    overflow: hidden;
    border-radius: 10px;
}

.account-2 button {
    padding: 14px 40px;
    color: #fff;
    transition: 0.4s;
    border-radius: 2px;
    background-color: #a0344f;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
    border-top-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.account-2 button:hover {
    background-color: #fff;
    color: #a0344f;
}

.account-2 button:focus {
    box-shadow: none;
    outline: none;
    background-color: #fff;
    color: #b83a59cc;
    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.1),
        0px 1px 3px 0px rgba(0, 0, 0, 0.08);
}

.account-2 {
    position: absolute;
    top: 90%;
    left: 20%;
}

.card-container:hover {
    filter: grayscale(30%);
    transition: 2s;
}

.card-container img:hover {
    transform: scale(1.1) translateY(-50px);
    transition: 2s;
}

.card-name h4{
    color: #fff;
    font-size: 12px;
}

.card-name{
    position: absolute;
    top:10%;
    left:10%;
}

</style>

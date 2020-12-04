<template>
     <div class="About-us">
         <router-view></router-view>
         <YouthNavbar />
        <div class="section-1">
        <div class="Title--1">
            <h3>Discover a world of world‑class Youthful Development</h3>
            <p>With millions of songs, over 100 games, Apple Original shows and movies, and more, there’s something for everyone in every Apple One plan.</p>
        </div>
        <div class="media-img">
           <img  src="../../assets/ipad.png" alt="ipad icon">
        </div>
        </div>

    </div>
</template>

<script>
import YouthNavbar from '../components/YouthNavbar'
export default {

     components:{
         YouthNavbar,
     },

}
</script>

<style scope>

.section-1{
    display: flex;
    margin-left: 10%;
    margin-top: 150px;
    overflow: hidden;
    padding: 100px;
}

.Title--1 h3{
     font-family: Fenotype;
    font-size: 94px;
    margin-bottom: 20px;
    color:#000;
    max-width: 30vw;

}

.Title--1 p{
    font-size: 24px;
    color:#000;
    max-width: 20vw;
}

.media-img img{
    transform: translateY(-30px) scale(1.2);
}



</style>

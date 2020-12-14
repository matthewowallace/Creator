<template>
      <div class="navbar">
            <nav>
                <ul>
                  <li>
                    <Icon type="logo-facebook"  size="22"/>
                </li>
                <li>
                    <Icon type="logo-twitter"  size="22"/>
                </li>
                <li>
                    <Icon type="logo-instagram" size="22"/>
                </li>
                <li>
                    <Icon type="logo-whatsapp" size="22"/>
                </li>
                <li>
                    <Icon type="logo-snapchat" size="22"/>
                </li>
                <li>
                    <Icon type="logo-reddit" />
                </li>
                </ul>

            </nav>
         </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .navbar{
        margin-top: 20px;
    }

    ul li{
        display: inline-block;
    }

    li{
        padding: 20px;
        font-size: 20px;
        color:#fff;
    }

    li:hover{
         color: red;
         animation: hue-rotate 10s linear infinite;
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

</style>

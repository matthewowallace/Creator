<template>

    <div id="textSlider" class="row">
      <div class="col-xs-12 col-sm-12 col-md-7 col-lg-12 slideCol">
        <div class="scroller">
          <div class="inner">
            <p>motivate</p>
            <p>innovate</p>
            <p>inspire</p>
            <p>grow</p>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>

/* Slider */
#textSlider.row {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 100% !important;
}
#textSlider div {
	color: #1b1c1e;
	font-family: 'Fenotype', sans-serif;
	text-transform: uppercase;
    font-size: 150pt ;
    text-align: center;
}

.iamCol {
    text-align: right;
	float: left;
	font-weight: 300;
	font-size:30pt;
}
.iamCol p:nth-child(2) { margin-top: -20pt !important; }
.slideCol {
	text-align: left;
    overflow: hidden;
	font-weight: 500;
	font-size:100pt;
	display: block;
	white-space: nowrap;
}
.slideCol p { margin: 0px !important; }

.scroller {
   height: 150pt;
   line-height: 150pt;
   overflow: hidden;
}
.scroller .inner { animation: 10s normal infinite running scroll; }
@keyframes scroll {
   0%  	{margin-top: 0px;}
   15% 	{margin-top: 0px;}

   25%  {margin-top: -150pt;}
   40%  {margin-top: -150pt;}

   50%  {margin-top: -300pt;}
   65%  {margin-top: -300pt;}

   75%  {margin-top: -450pt;}
   90%  {margin-top: -450pt;}

   100% {margin-top: 0px;}
}


/*==========  Mobile First Method  ==========*/

/* Custom, iPhone Retina */
@media only screen and (min-width : 320px) and (max-width : 479px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
    .iamCol { text-align: center; font-size:20pt; }
	.iamCol p { display: inline !important; }
	.slideCol { font-size: 25pt; text-align: center; margin-top: -20px; }
}

/* Extra Small Devices, Phones */
@media only screen and (min-width : 480px) and (max-width : 765px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
    .iamCol { text-align: center; font-size:25pt; }
	.iamCol p { display: inline !important; }
	.slideCol { font-size: 38pt; text-align: center; margin-top: -20px; }
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) and (max-width : 992px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
	.iamCol { text-align: center; font-size:30pt; }
	.iamCol p { display: inline !important; }
	.slideCol { font-size: 50pt; text-align: center; margin-top: 5px; }
}

/* Medium Devices, Desktops */
@media only screen and (min-width : 992px) and (max-width : 1200px) {
	#textSlider.row { margin-right: 0px !important; margin-left: 0px !important; }
	.iamCol { text-align: right; font-size:30pt; }
	.slideCol { font-size: 55pt; text-align: left; }
}




    /* Desktops and laptops ----------- */
        @media only screen
        and (max-width : 1366px) {

          /* Slider */
        #textSlider.row {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100% !important;
        }
        #textSlider div {
            color: #1b1c1e;
            font-family: 'Fenotype', sans-serif;
            text-transform: uppercase;
            font-size: 100pt ;
            text-align: center;
        }

        .iamCol {
            text-align: right;
            float: left;
            font-weight: 300;
            font-size:30pt;
        }
        .iamCol p:nth-child(2) { margin-top: -20pt !important; }
        .slideCol {
            text-align: left;
            overflow: hidden;
            font-weight: 500;
            font-size:100pt;
            display: block;
            white-space: nowrap;
        }
        .slideCol p { margin: 0px !important; }

        .scroller {
        height: 100pt;
        line-height: 100pt;
        overflow: hidden;
        }
        .scroller .inner { animation: 10s normal infinite running scroll; }
        @keyframes scroll {
        0%  	{margin-top: 0px;}
        15% 	{margin-top: 0px;}

        25%  {margin-top: -100pt;}
        40%  {margin-top: -100pt;}

        50%  {margin-top: -200pt;}
        65%  {margin-top: -200pt;}

        75%  {margin-top: -300pt;}
        90%  {margin-top: -300pt;}

        100% {margin-top: 0px;}
        }



    }

    @media only screen
    and (max-width : 420px) {

        /* Slider */
        #textSlider.row {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100% !important;
        }
        #textSlider div {
            color: #1b1c1e;
            font-family: 'Fenotype', sans-serif;
            text-transform: uppercase;
            font-size: 50pt ;
            text-align: center;
        }

        .iamCol {
            text-align: right;
            float: left;
            font-weight: 300;
            font-size:30pt;
        }
        .iamCol p:nth-child(2) { margin-top: -20pt !important; }
        .slideCol {
            text-align: left;
            overflow: hidden;
            font-weight: 500;
            font-size:50pt;
            display: block;
            white-space: nowrap;
        }
        .slideCol p { margin: 0px !important; }

        .scroller {
        height: 50pt;
        line-height: 50pt;
        overflow: hidden;
        }
        .scroller .inner { animation: 10s normal infinite running scroll; }
        @keyframes scroll {
        0%  	{margin-top: 0px;}
        15% 	{margin-top: 0px;}

        25%  {margin-top: -50pt;}
        40%  {margin-top: -50pt;}

        50%  {margin-top: -100pt;}
        65%  {margin-top: -100pt;}

        75%  {margin-top: -200pt;}
        90%  {margin-top: -200pt;}

        100% {margin-top: 0px;}
        }


    }

</style>

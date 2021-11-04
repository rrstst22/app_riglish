<template>
<div>
<div class="text-center my-4">
    <h2>Are You Ready?</h2>
</div>
<div class="container">
  <div class="rotation"></div>
  <div class="circle"></div>
  <div class="line1"></div>
  <div class="line2"></div>
  <div class="count">
    <p>3</p>
    <p>2</p>
    <p>1</p>
  </div>
</div>

</div>
</template>
<script>
    export default {
      props: {
          level: {
              type: String,
              default: "novice",
          },
      },
      created() {
        window.setTimeout(this.startQuestions, 3000);
      },
      methods: {
          startQuestions: function () {
              this.$router.push({name: "question", params: {level: this.level}});
          }
      }
    }
</script>
<style scoped>
body{
  margin: 0;
  padding: 0;
}

p{
padding: 10px;
}

.container{
  position:relative;
  width: 100%;
  height: 350px;
  background: white;
  overflow: hidden;
  animation: black-out 1s 10s linear;
}

/* count */
.count p{
  position: absolute;
  top: 100px;
  left: 50%;
  transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  margin: 0;
  padding: 0;
  color: black;
  font-size: 100px;
  font-weight: bold;
  opacity:0;
}


.count p:nth-child(1) {
  animation: count-down 1s 0s;
}

.count p:nth-child(2) {
  animation: count-down 1s 1s;
}

.count p:nth-child(3) {
  animation: count-down 1s 2s;
}

@keyframes count-down {
  0%,100% {opacity:1;}
}


/* circle */
.circle{
  position: absolute;
  top: 100px;
  left: 50%;
  transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  width: 160px;
  height: 160px;
  border: double 15px #a0a0a0;
  border-radius: 50%;
}

/* rotation */
.rotation {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	-webkit-transform: translate(-50%,-50%);
	box-sizing: border-box;
	width: 1500px;
	height: 1500px;
	border-radius: 50%;
	background: #fff;
	background-image: linear-gradient(to right, #dcdcdc 50%, transparent 0);
}

.rotation::before{ 
	content: '';
	display: block;
	margin-left: 50%;
	height: 100%;
	border-radius: 0 100% 100% 0 / 50%;
	background-color: inherit;
	transform-origin: left;
	background: #dcdcdc;
	transform: rotate(0turn);
	animation: rotation1 .5s linear 20, rotation2 1s step-end 10;
}

@keyframes rotation1 {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(180deg); }
}


@keyframes rotation2 {
	0% { background: #dcdcdc; }
	50% { background: #fff; }
}
</style>
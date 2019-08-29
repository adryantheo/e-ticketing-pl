<template>
   <v-app>
      <v-carousel
      height="700"
      >
         <v-carousel-item
         max-he
         v-for="(item, i) in carousel"
         :key="i"
         :src="item.images"
         reverse-transition="fade"
         transition:="fade"
         interval="7500"
         ></v-carousel-item>
      </v-carousel>
   </v-app>
</template>
<script>
export default {
   data:() => ({
      carousel:[
         {images: "/assets/yuyuns.jpg"},
         {images: "/assets/ngamen.jpg"},
         {images: "/assets/ngamen2.jpg"},
         {images: "/assets/ngamen3.jpg"},
      ]
   })
}
</script>
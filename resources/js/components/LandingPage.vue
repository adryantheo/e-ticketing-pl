<template>
   <v-app>
      <v-parallax
      
      >
         <v-layout
         justify-center
         align-center
         >
         <v-img
         ></v-img>
         </v-layout>
      </v-parallax>
      <v-container grid-list-lg>
         <v-layout row wrap align-center justify-center>
          <v-flex xs12 sm12 lg4 xl4>
             <v-card>
                <v-card-title class="title text-xs-center">reguler</v-card-title>
             </v-card>
          </v-flex>
          <v-flex xs12 sm12 lg4 xl4>
             <v-card>
                <v-card-text class="headline text-xs-center">
                   VIP
                </v-card-text> 
                <v-flex  v-for="(item, i) in vipFitur" 
                   :key="i">
                   <div class="font-height-bold">=>{{ item.text}}</div>
                </v-flex>
             </v-card>
          </v-flex>
         </v-layout>
      </v-container>
   </v-app>
</template>
<script>
export default {
   data:() => ({
      vipFitur: [
         {text: "Kursi berada pada baris depan"},
         {text: "snack selama pertujukan"},
         {text: "buku kenanang-kenangan"}
      ],
      
   })
}
</script>
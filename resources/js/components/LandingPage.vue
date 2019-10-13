<template>
   <v-app>
      <v-content>
         <v-carousel
            height="700"
            >
         <v-carousel-item
         dark
         v-for="(item, i) in carousel"
         :key="i"
         :src="item.images"
         reverse-transition="fade"
         transition:="fade"
         ></v-carousel-item>
      </v-carousel>

      </v-content>
      
      <v-container grid-list-lg>
        <v-layout row wrap align-center justify-space-around>
         <v-flex xs12 sm12 lg6 xl6 color="blue">
            <v-card class="rounded" elevation="10">
               <v-card-text>
                  <v-icon class="text-xs-center" size="100" color="primary">
                   fa fa-map-marker
                  </v-icon>
               </v-card-text>
               <v-card-text>
                   <h3>Gelar budaya SMA Pangudi Luhur St.Yusup Yogyakarta tahun ini diselenggarakan di Taman Budaya Yogyakarta(TBY), yang berlokasi di  Jl. Sriwedani No.1, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122</h3>
               </v-card-text>
            </v-card>
           </v-flex>
           <v-flex sm12 lg6 xl6>
              <v-card class="rounded" elevation="10">
                 <v-card-text class="text-xs-center">
                    <v-icon  color="primary" class="text-xs-center" size="100">fa fa-calendar</v-icon>
                 </v-card-text>
                 <v-card-text>
                    <h3>Tanggal: 14 November 2019</h3>
                    <h3>Waktu: --</h3>
                 </v-card-text>
                 <v-card-text>
                 </v-card-text>
              </v-card>
           </v-flex>
        </v-layout>
      </v-container>
      <template>
      <v-container grid-list-lg>
         <v-layout>
            <v-flex>
               <v-card class="rounded1" elevation="5">
                  <v-card-text class="headline text-xs-center">
                     Acaranya asik lo, Buruan booking tiketnya sekarang sebelum kehabisan
                  </v-card-text>
                  <v-layout align-center justify-space-around>
                     <v-flex>
                     <v-icon size="200"> fa fa-ticket</v-icon>
                  </v-flex>
                  <v-flex>
                     <v-btn
                     outline round large
                     :to="{path: '/login'}"
                     >
                     booking
                  </v-btn>
                  </v-flex>
                  </v-layout>
               </v-card>
            </v-flex>
         </v-layout>
      </v-container>     
      </template>
      <footer-app></footer-app>
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
   }),
   methods: {
      // 
   }
}
</script>
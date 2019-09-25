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
         <v-flex xs12 sm12 lg4 xl4 color="blue">
              <v-icon class="text-xs-center" size="100" color="primary">
                 fa fa-map-marker
              </v-icon>
              <v-flex xs6 lg12>
                 Gelar budaya SMA Pangudi Luhur St.Yusup Yogyakarta tahun ini diselenggarakan di Taman Budaya Yogyakarta(TBY), yang berlokasi di  Jl. Sriwedani No.1, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122
              </v-flex>
              <v-spacer></v-spacer>
           </v-flex>
           <v-flex lg4 xl4>
              <v-icon  color="primary" class="text-xs-center" size="100">fa fa-calendar</v-icon>
              <v-flex>
                 Gelar Budaya ini akan diselenggarakan pada:
              </v-flex>
              <v-flex>  
                 Tanggal: 14 November 2019
                 <v-spacer></v-spacer>
                 Waktu: --
              </v-flex>
           </v-flex>
        </v-layout>
      </v-container>
      <template>
         <v-container fluid grid-list-lg>
         <v-layout row wrap justify-center align-center>
            <v-flex xs12 sm12 lg8 xl8>
               <v-card>
                  <v-flex >
                     <v-img
                     src="/assets/yuyuns.jpg"
                     ></v-img>
                     <v-spacer></v-spacer>
                  </v-flex>
                  <v-card-text class="text-xs-center title">
                  Sinopsis Gelar Budaya 2019
               </v-card-text>
               <v-card-text>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                  Where does it come from?
                  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
               </v-card-text>
               </v-card>
            </v-flex>
         </v-layout>
      </v-container>
      <v-container grid-list-lg>
         <v-layout>
            <v-flex>
               <v-card flat>
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
import DialohOrderTicket from './customers/DialogOrderTicket'
export default {
   components: {
      DialohOrderTicket
   },
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
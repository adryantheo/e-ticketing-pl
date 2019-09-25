<template>
   <v-app>
      <v-toolbar app dense clipped-left>
         <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
         <v-toolbar-title>E-Tiket</v-toolbar-title>
      </v-toolbar>
      <v-navigation-drawer app clipped v-model="drawer">
         <v-list>
            <v-list-tile
            v-for="(item, index) in routes"
            router 
            :to="item.route"
            :key="'menu'+index"
            >
               <v-list-tile-action>
                  <v-icon> {{item.icon}} </v-icon>
               </v-list-tile-action>
               <v-list-tile-title>
                  {{item.title}}
               </v-list-tile-title>
            </v-list-tile>
            <v-divider></v-divider>
            <v-list-tile @click="logout">
               <v-list-tile-action>
                  <v-icon>fa fa-sign-out</v-icon>
               </v-list-tile-action>
               <v-list-tile-content>
                  <v-list-tile-title>
                     keluar
                  </v-list-tile-title>
               </v-list-tile-content>
            </v-list-tile>
         </v-list>
      </v-navigation-drawer>
      <v-content>
         <router-view></router-view>
      </v-content>
         <footer-app></footer-app>
   </v-app>
</template>
<script>
export default {
   data: () => ({
      drawer: false,
      routes:[
         {
           icon: "fa fa-ticket",
           title: "tiketku",
           route: "tiket"
         },
         {
            icon: "fa fa-money",
            title: "Konfirmasi Pembayaran",
            route: "payment"
         }
      ]
   }),
   methods: {
      async logout(){
         try{
            await this.$user.logout();
            this.$user.clearStorage();
            this.$router.replace({path: '/login'})
         }catch(err){
            console.log(err)
         }
      }
   },
}
</script>
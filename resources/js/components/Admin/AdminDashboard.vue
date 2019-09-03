<template>
   <v-app>
      <v-toolbar>
         <v-toolbar-side-icon></v-toolbar-side-icon>
         <v-toolbar-title>E-tiker</v-toolbar-title>
      </v-toolbar>
      <v-navigation-drawer>
         <v-list>
            <v-list-tile
            v-for="(item, index) in panel"
            :key="'menu'+index"
            :to="item.route"
            router

            >
               <v-list-tile-action>
                  <v-icon> {{item.icon}} </v-icon>
               </v-list-tile-action>
               <v-list-tile-content>
                  <v-list-tile-title>
                     {{item.tile}}
                  </v-list-tile-title>
               </v-list-tile-content>
            </v-list-tile>
            <v-divider></v-divider>
            <v-list-tile>
               <v-list-tile-content>
                  <v-icon>
                     fa fa-
                  </v-icon>
               </v-list-tile-content>
            </v-list-tile> 
         </v-list>
      </v-navigation-drawer>
   </v-app>
</template>
<script>
export default {
   data: () => ({
      panel: [
         {
            icon: "fa fa-home",
            title: "beranda",
            route: "home"
         },
         {
            icon: "fa fa-user",
            title: "user",
            route: "user"
         },
         {
            icon: "fa fa-ticket",
            title: "konfirmasi tiket",
            route: "ticket"
         }
      ]
   })
}
</script>
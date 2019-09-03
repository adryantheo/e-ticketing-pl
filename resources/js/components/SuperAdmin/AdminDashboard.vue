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
         </v-list>
      </v-navigation-drawer>
   </v-app>
</template>
<script>
export default {
   data: () => ({
      drawer:false,
      routes: [
         {
            icon: "fa fa-home",
            title: "home",
            route: "home"
         },
         {
            icon: "fa fa-users",
            title:"user",
            route:"user"
         },
         {
            icon: "fa fa-ticket",
            title: "tiket",
            route: "ticket"
         },
      ],
   })
}
</script>
<template>
   <v-container grid-list-lg>
      <v-layout row wrap v-if="loading">
         <v-flex class="text-xs-center">
            <v-progress-circular
            indeterminate
            :size="70"
            :width="7"
            ></v-progress-circular>
         </v-flex>
      </v-layout>
      <template v-else>
         <v-layout row wrap >
            <v-flex></v-flex>
         </v-layout>
      </template>
   </v-container>
</template>
<script>
export default {
   data() {
      return{
         // 
      }
   }
}
</script>
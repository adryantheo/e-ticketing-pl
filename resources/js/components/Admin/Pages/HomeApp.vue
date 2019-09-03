<template>
   <v-container grid-list-lg>
      <v-layout row wrap v-if="loading">
         <v-flex class="text-xs-center">
            <v-progress-circular
            indeterminate
            :size="70"
            :width="7"
            color="primary"
            ></v-progress-circular>
         </v-flex>
      </v-layout>
      <div v-else>
         <v-layout>
            <v-flex>
               <v-table>
                  
               </v-table>
            </v-flex>
         </v-layout>
      </div>
   </v-container>
</template>
<script>
export default {
   data: () => ({
      loading: true
   })
}
</script>
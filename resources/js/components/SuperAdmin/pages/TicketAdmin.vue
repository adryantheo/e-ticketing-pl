<template>
   <v-container grid-list-lg>
      <v-layout row wrap >
         <v-flex >
            <p>Daftar Tiket</p>
         </v-flex>
      </v-layout>
      <v-data-table
      :headers="headers"
      :items="items"
      :loading="loading"
      rows-per-page-text="Baris per Halaman"
      >
         <template v-slot:item="props">
            
         </template>
      </v-data-table>
   </v-container>
</template>
<script>
export default {
   
}
</script>
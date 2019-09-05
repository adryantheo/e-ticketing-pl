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
            <td> {{props.item.id}} </td>
            <td>  </td>
            <td> {{props.item.status}} </td>
            <td>
            </td>
         </template>
      </v-data-table>
   </v-container>
</template>
<script>
export default {
   data: ()=> ({
      // 
   })
}
</script>